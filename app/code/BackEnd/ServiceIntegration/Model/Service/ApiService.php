<?php
namespace BackEnd\ServiceIntegration\Model\Service;

use BackEnd\ServiceIntegration\Api\RestClientInterface;
use BackEnd\ServiceIntegration\Api\SoapClientInterface;
use Psr\Log\LoggerInterface;

class ApiService
{
    private $restClient;
    private $soapClient;
    private $logger;

    public function __construct(
        RestClientInterface $restClient,
        SoapClientInterface $soapClient,
        LoggerInterface $logger
    ) {
        $this->restClient = $restClient;
        $this->soapClient = $soapClient;
        $this->logger = $logger;
    }

    public function callRestApi($endpoint, $params = [], $method = 'GET', $headers = [])
    {
        try {
            $this->restClient->setHeaders($headers);
            $response = $this->restClient->request($endpoint, $params, $method);

            return [
                'success' => true,
                'status' => $response['status'],
                'data' => $response['body']
            ];
        } catch (\Exception $e) {
            $this->logger->error("Error en callRestApi: " . $e->getMessage());
            return [
                'success' => false,
                'status' => $this->restClient->getStatusCode(),
                'message' => $e->getMessage()
            ];
        }
    }

    public function callSoapApi($endpoint, $params = [], $method = 'GET', $options = [])
{
    try {
        $this->soapClient->setOptions($options);
        $response = $this->soapClient->request($endpoint, $params, $method);

        return [
            'success' => true,
            'status' => $response['status'],
            'data' => $response['body']
        ];
    } catch (\Exception $e) {
        $this->logger->error("Error en callSoapApi: " . $e->getMessage());
        return [
            'success' => false,
            'status' => $this->soapClient->getStatusCode(),
            'message' => $e->getMessage()
        ];
    }
}
}