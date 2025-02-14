<?php
namespace RabbitMQ\OrderSync\Cron;

use RabbitMQ\OrderSync\Model\OrderSync;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;
use Psr\Log\LoggerInterface;

class SendRecentOrders
{
    protected $orderSync;
    protected $orderCollectionFactory;
    protected $logger;

    public function __construct(
        OrderSync $orderSync,
        CollectionFactory $orderCollectionFactory,
        LoggerInterface $logger
    ) {
        $this->orderSync = $orderSync;
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->logger = $logger;
    }

    public function execute()
    {
        try {
            // Obtener la fecha y hora actual menos 30 minutos.
            $fromTime = date('Y-m-d H:i:s', strtotime('-30 minutes'));

            // Consultar las órdenes creadas en los últimos 30 minutos.
            $orders = $this->orderCollectionFactory->create()
                ->addFieldToFilter('created_at', ['gteq' => $fromTime]);

            if ($orders->getSize() > 0) {
                foreach ($orders as $order) {
                    // Enviar cada orden a RabbitMQ.
                    $this->orderSync->sendOrderToQueue($order);
                    $this->logger->info("Orden enviada a RabbitMQ desde el cron: " . $order->getIncrementId());
                }
            } else {
                $this->logger->info("No hay órdenes nuevas en los últimos 30 minutos.");
            }
        } catch (\Exception $e) {
            $this->logger->error("Error en el cron job de envío de órdenes: " . $e->getMessage());
        }
    }
}