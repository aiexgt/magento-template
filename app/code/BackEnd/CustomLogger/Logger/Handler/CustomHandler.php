<?php

namespace BackEnd\CustomLogger\Logger\Handler;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class CustomHandler extends AbstractProcessingHandler
{
    protected function write(array $record): void
    {
        // Define la ruta del archivo de log personalizado
        $logFilePath = BP . '/var/log/custom.log';

        // Formatea el mensaje de log
        $logMessage = sprintf(
            "[%s] %s: %s\n",
            $record['datetime']->format('Y-m-d H:i:s'),
            $record['level_name'],
            $record['message']
        );

        // Escribe el mensaje en el archivo de log
        file_put_contents($logFilePath, $logMessage, FILE_APPEND);
    }
}