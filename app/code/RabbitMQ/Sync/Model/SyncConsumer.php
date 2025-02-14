<?php
namespace RabbitMQ\Sync\Model;

use Psr\Log\LoggerInterface;

class SyncConsumer
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function process($data)
    {
        try {
            $data = json_decode($data, true);
            // Aquí puedes implementar la lógica para sincronizar los datos con otro sistema.
            $this->logger->info("Datos recibidos para sincronización: " . print_r($data, true));
        } catch (\Exception $e) {
            $this->logger->error("Error al procesar los datos: " . $e->getMessage());
        }
    }
}