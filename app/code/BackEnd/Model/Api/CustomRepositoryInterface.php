<?php
namespace BackEnd\Model\Api;

use BackEnd\Model\Api\Data\CustomDataInterface;

interface CustomRepositoryInterface
{
    /**
     * @param int $id
     * @return \BackEnd\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \BackEnd\Model\Api\Data\CustomDataInterface $customData
     * @return \BackEnd\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CustomDataInterface $customData);
}