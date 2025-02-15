<?php
namespace BackEnd\ServiceIntegration\Api;

interface ClientInterface
{
    /**
     * Realiza una petición a un servicio externo.
     *
     * @param string $endpoint
     * @param array $params
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function request($endpoint, $params = [], $method = 'GET');

    /**
     * Obtiene el último código de estado HTTP.
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Obtiene el último mensaje de error.
     *
     * @return string
     */
    public function getErrorMessage();
}