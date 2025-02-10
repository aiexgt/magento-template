<?php
namespace Magento\ServiceIntegration\Model\Client;

use Magento\ServiceIntegration\Api\SoapClientInterface;
use Psr\Log\LoggerInterface;

class SoapClient implements SoapClientInterface
{
    private $client;
    private $options = [];
    private $errorMessage;
    private $statusCode = 200; // Código de estado predeterminado
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function request($endpoint, $params = [], $method = 'GET')
    {
        try {
            $this->client = new \SoapClient($endpoint, $this->options);
            $response = $this->client->__soapCall($method, $params);

            return [
                'status' => $this->statusCode,
                'body' => $response
            ];
        } catch (\SoapFault $e) {
            $this->errorMessage = "Error en la petición SOAP: " . $e->getMessage();
            $this->statusCode = 500; // Código de estado para errores
            $this->logger->error($this->errorMessage);
            throw new \Exception($this->errorMessage);
        }
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}