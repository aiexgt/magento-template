<?php
namespace RabbitMQ\Sync\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RabbitMQ\Sync\Model\DataSync;

class SyncData extends Command
{
    protected $dataSync;

    public function __construct(DataSync $dataSync)
    {
        $this->dataSync = $dataSync;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('rabbitmq:sync:data')
            ->setDescription('Envía datos a RabbitMQ para sincronización');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = [
            'id' => 1,
            'name' => 'Producto de prueba',
            'price' => 99.99,
            'sku' => 'TEST123'
        ];

        $this->dataSync->sendData($data);
        $output->writeln("Datos enviados a RabbitMQ para sincronización.");

        return 0;
    }
}