<?php
namespace Magento\CustomApi\Api;

interface CustomEndpointInterface
{
    /**
     * Obtiene datos personalizados.
     *
     * @param string $param
     * @return \Magento\CustomApi\Api\Data\CustomResponseInterface
     */
    public function getData($param);

    /**
     * Publica datos personalizados.
     *
     * @param string $data
     * @return \Magento\CustomApi\Api\Data\CustomResponseInterface
     */
    public function postData($data);
}