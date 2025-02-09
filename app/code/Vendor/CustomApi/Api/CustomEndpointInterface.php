<?php
namespace Vendor\CustomApi\Api;

interface CustomEndpointInterface
{
    /**
     * Obtiene datos personalizados.
     *
     * @param string $param
     * @return \Vendor\CustomApi\Api\Data\CustomResponseInterface
     */
    public function getData($param);

    /**
     * Publica datos personalizados.
     *
     * @param string $data
     * @return \Vendor\CustomApi\Api\Data\CustomResponseInterface
     */
    public function postData($data);
}