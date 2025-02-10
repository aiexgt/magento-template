<?php
namespace Magento\ServiceIntegration\Api;

interface SoapClientInterface extends ClientInterface
{
    /**
     * Establece las opciones para el cliente SOAP.
     *
     * @param array $options
     * @return void
     */
    public function setOptions($options);
}