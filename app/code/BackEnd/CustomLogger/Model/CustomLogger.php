<?php

namespace BackEnd\CustomLogger\Model;

use Psr\Log\LoggerInterface;

class CustomLogger
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * CustomLogger constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Log a custom message.
     *
     * @param string $message
     */
    public function log($message)
    {
        // Registra el mensaje en el archivo de log personalizado
        $this->logger->info($message);
    }
}