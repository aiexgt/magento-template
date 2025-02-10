<?php
namespace Magento\CustomApi\Api\Data;

interface CustomResponseInterface
{
    /**
     * Obtiene el mensaje de respuesta.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Establece el mensaje de respuesta.
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * Obtiene el código de estado.
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Establece el código de estado.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode);
}