<?php
namespace RabbitMQ\Sync\Model;

use Magento\Framework\MessageQueue\PublisherInterface;

class DataSync
{
    protected $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function sendData($data)
    {
        $this->publisher->publish('rabbitmq.sync.data', json_encode($data));
    }
}