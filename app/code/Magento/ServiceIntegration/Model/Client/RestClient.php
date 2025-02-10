<?php
namespace Magento\ServiceIntegration\Model\Client;

use Magento\ServiceIntegration\Api\RestClientInterface;
use Magento\Framework\HTTP\Client\Curl;
use Psr\Log\LoggerInterface;

class RestClient implements RestClientInterface
{
    private $curl;
    private $headers = [];
    private $statusCode;
    private $errorMessage;
    private $logger;

    public function __construct(Curl $curl, LoggerInterface $logger)
    {
        $this->curl = $curl;
        $this->logger = $logger;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function request($endpoint, $params = [], $method = 'GET')
    {
        try {
            $this->curl->setHeaders($this->headers);

            if ($method === 'GET') {
                $this->curl->get($endpoint . '?' . http_build_query($params));
            } else {
                $this->curl->post($endpoint, $params);
            }

            $this->statusCode = $this->curl->getStatus();
            $response = $this->curl->getBody();

            if ($this->statusCode >= 400) {
                $this->errorMessage = "Error en la petición REST: Código {$this->statusCode}";
                $this->logger->error($this->errorMessage);
                throw new \Exception($this->errorMessage);
            }

            return [
                'status' => $this->statusCode,
                'body' => json_decode($response, true)
            ];
        } catch (\Exception $e) {
            $this->logger->error("Error en RestClient: " . $e->getMessage());
            throw $e;
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