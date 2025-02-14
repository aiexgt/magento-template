<?php
namespace RabbitMQ\BulkSync\Model;

use Magento\Framework\MessageQueue\PublisherInterface;
use Psr\Log\LoggerInterface;

class BulkSync
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

    public function sendBulkData(array $data, $batchSize = 100)
    {
        $batches = array_chunk($data, $batchSize);

        foreach ($batches as $batch) {
            $this->publisher->publish('rabbitmq.bulksync.data', json_encode($batch));
            $this->logger->info("Lote enviado a RabbitMQ: " . count($batch) . " elementos");
        }
    }
}