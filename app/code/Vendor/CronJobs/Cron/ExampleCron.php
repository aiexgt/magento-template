<?php
namespace Vendor\CronJobs\Cron;

use Psr\Log\LoggerInterface;

class ExampleCron
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Ejecuta el cron job.
     *
     * @return void
     */
    public function execute()
    {
        $this->logger->info('Cron job ejecutado: ' . date('Y-m-d H:i:s'));
    }
}