<?php
namespace BackEnd\Service\Api;

interface CustomServiceInterface
{
    /**
     * Devuelve un mensaje de saludo.
     *
     * @param string $name
     * @return string
     */
    public function greet($name);
}