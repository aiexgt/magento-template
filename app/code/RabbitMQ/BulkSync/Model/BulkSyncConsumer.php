<?php
namespace RabbitMQ\BulkSync\Model;

use Psr\Log\LoggerInterface;

class BulkSyncConsumer
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function process($data)
    {
        try {
            $batch = json_decode($data, true);
            // Aquí puedes implementar la lógica para sincronizar el lote de datos.
            $this->logger->info("Procesando lote de datos: " . count($batch) . " elementos");
        } catch (\Exception $e) {
            $this->logger->error("Error al procesar el lote de datos: " . $e->getMessage());
        }
    }
}