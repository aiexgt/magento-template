<?php
namespace BackEnd\CustomApi\Api;

interface CustomEndpointInterface
{
    /**
     * Obtiene datos personalizados.
     *
     * @param string $param
     * @return \BackEnd\CustomApi\Api\Data\CustomResponseInterface
     */
    public function getData($param);

    /**
     * Publica datos personalizados.
     *
     * @param string $data
     * @return \BackEnd\CustomApi\Api\Data\CustomResponseInterface
     */
    public function postData($data);
}