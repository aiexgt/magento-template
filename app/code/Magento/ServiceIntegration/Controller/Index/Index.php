<?php
namespace Magento\ServiceConsumer\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\ServiceIntegration\Model\Service\ApiService;

class Index extends Action
{
    private $apiService;

    public function __construct(
        Context $context,
        ApiService $apiService
    ) {
        parent::__construct($context);
        $this->apiService = $apiService;
    }

    public function execute()
    {
        // Ejemplo de petición REST
        $restResponse = $this->apiService->callRestApi(
            'https://api.example.com/data',
            ['param1' => 'value1'],
            'GET',
            ['Authorization' => 'Bearer token']
        );

        // Ejemplo de petición SOAP
        $soapResponse = $this->apiService->callSoapApi(
            'https://api.example.com/soap',
            ['param1' => 'value1'],
            'methodName',
            ['trace' => 1]
        );

        if ($restResponse['success']) {
            echo "<h1>Respuesta REST:</h1>";
            echo "<pre>";
            print_r($restResponse['data']);
            echo "</pre>";
        } else {
            echo "<h1>Error en REST:</h1>";
            echo "<p>Código de estado: " . $restResponse['status'] . "</p>";
            echo "<p>Mensaje: " . $restResponse['message'] . "</p>";
        }

        if ($soapResponse['success']) {
            echo "<h1>Respuesta SOAP:</h1>";
            echo "<pre>";
            print_r($soapResponse['data']);
            echo "</pre>";
        } else {
            echo "<h1>Error en SOAP:</h1>";
            echo "<p>Código de estado: " . $soapResponse['status'] . "</p>";
            echo "<p>Mensaje: " . $soapResponse['message'] . "</p>";
        }
    }
}