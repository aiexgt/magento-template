<?php
namespace Vendor\Model\Api;

use Vendor\Model\Api\Data\CustomDataInterface;

interface CustomRepositoryInterface
{
    /**
     * @param int $id
     * @return \Vendor\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Vendor\Model\Api\Data\CustomDataInterface $customData
     * @return \Vendor\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CustomDataInterface $customData);
}