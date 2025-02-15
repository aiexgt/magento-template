<?php
namespace BackEnd\ServiceIntegration\Api;

interface RestClientInterface extends ClientInterface
{
    /**
     * Establece las cabeceras para la petición REST.
     *
     * @param array $headers
     * @return void
     */
    public function setHeaders($headers);
}