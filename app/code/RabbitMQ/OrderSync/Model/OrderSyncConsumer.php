<?php
namespace RabbitMQ\OrderSync\Model;

use Psr\Log\LoggerInterface;

class OrderSyncConsumer
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function process($data)
    {
        try {
            $orderData = json_decode($data, true);
            // Aquí puedes implementar la lógica para enviar la orden al sistema externo.
            $this->logger->info("Procesando orden: " . $orderData['increment_id']);

            // Ejemplo de envío a un sistema externo (simulado).
            $this->sendToExternalSystem($orderData);
        } catch (\Exception $e) {
            $this->logger->error("Error al procesar la orden: " . $e->getMessage());
        }
    }

    protected function sendToExternalSystem($orderData)
    {
        // Simula el envío de la orden a un sistema externo.
        $this->logger->info("Orden enviada al sistema externo: " . $orderData['increment_id']);
    }
}