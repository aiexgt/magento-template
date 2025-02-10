<?php
namespace Magento\CustomApi\Model;

use Magento\CustomApi\Api\CustomEndpointInterface;
use Magento\CustomApi\Api\Data\CustomResponseInterface;
use Magento\CustomApi\Model\Data\CustomResponseFactory;
use Psr\Log\LoggerInterface;

class CustomEndpoint implements CustomEndpointInterface
{
    private $responseFactory;
    private $logger;

    public function __construct(
        CustomResponseFactory $responseFactory,
        LoggerInterface $logger
    ) {
        $this->responseFactory = $responseFactory;
        $this->logger = $logger;
    }

    public function getData($param)
    {
        /** @var \Magento\CustomApi\Api\Data\CustomResponseInterface $response */
        $response = $this->responseFactory->create();

        try {
            // Lógica para obtener datos
            $response->setMessage("Datos obtenidos con éxito: $param");
            $response->setStatusCode(200);
        } catch (\Exception $e) {
            $this->logger->error("Error en getData: " . $e->getMessage());
            $response->setMessage("Error al obtener datos: " . $e->getMessage());
            $response->setStatusCode(500);
        }

        return $response;
    }

    public function postData($data)
    {
        /** @var \Magento\CustomApi\Api\Data\CustomResponseInterface $response */
        $response = $this->responseFactory->create();

        try {
            // Lógica para procesar datos
            $response->setMessage("Datos recibidos con éxito: $data");
            $response->setStatusCode(200);
        } catch (\Exception $e) {
            $this->logger->error("Error en postData: " . $e->getMessage());
            $response->setMessage("Error al procesar datos: " . $e->getMessage());
            $response->setStatusCode(500);
        }

        return $response;
    }
}