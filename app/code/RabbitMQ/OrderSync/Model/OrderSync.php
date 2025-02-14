<?php
namespace RabbitMQ\OrderSync\Model;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\MessageQueue\PublisherInterface;
use Psr\Log\LoggerInterface;
use Magento\Sales\Model\Order;

class OrderSync implements ObserverInterface
{
    protected $publisher;
    protected $logger;

    public function __construct(
        PublisherInterface $publisher,
        LoggerInterface $logger
    ) {
        $this->publisher = $publisher;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $this->sendOrderToQueue($order);
    }

    public function sendOrderToQueue(Order $order)
    {
        $orderData = [
            'id' => $order->getId(),
            'increment_id' => $order->getIncrementId(),
            'customer_email' => $order->getCustomerEmail(),
            'grand_total' => $order->getGrandTotal(),
            'status' => $order->getStatus(),
            'created_at' => $order->getCreatedAt()
        ];

        $this->publisher->publish('rabbitmq.ordersync.order', json_encode($orderData));
        $this->logger->info("Orden enviada a RabbitMQ: " . $order->getIncrementId());
    }
}