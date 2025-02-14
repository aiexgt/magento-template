<?php
namespace RabbitMQ\BulkSync\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RabbitMQ\BulkSync\Model\BulkSync;

class StartBulkSync extends Command
{
    protected $bulkSync;

    public function __construct(BulkSync $bulkSync)
    {
        $this->bulkSync = $bulkSync;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('rabbitmq:bulksync:start')
            ->setDescription('Inicia la sincronización masiva de datos');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Simula un gran volumen de datos (por ejemplo, 100,000 productos).
        $data = [];
        for ($i = 1; $i <= 100000; $i++) {
            $data[] = [
                'id' => $i,
                'name' => 'Producto ' . $i,
                'price' => rand(10, 1000),
                'sku' => 'SKU' . $i
            ];
        }

        // Envía los datos en lotes de 100 elementos.
        $this->bulkSync->sendBulkData($data, 100);
        $output->writeln("Sincronización masiva iniciada. Los datos se enviarán en lotes a RabbitMQ.");

        return 0;
    }
}