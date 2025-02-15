<?php
namespace BackEnd\Service\Model;

use BackEnd\Service\Api\CustomServiceInterface;

class CustomService implements CustomServiceInterface
{
    /**
     * Devuelve un mensaje de saludo.
     *
     * @param string $name
     * @return string
     */
    public function greet($name)
    {
        return "¡Hola, $name! Bienvenido a nuestro servicio personalizado.";
    }
}