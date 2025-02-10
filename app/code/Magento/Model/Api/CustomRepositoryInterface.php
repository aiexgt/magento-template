<?php
namespace Magento\Model\Api;

use Magento\Model\Api\Data\CustomDataInterface;

interface CustomRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magento\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Magento\Model\Api\Data\CustomDataInterface $customData
     * @return \Magento\Model\Api\Data\CustomDataInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(CustomDataInterface $customData);
}