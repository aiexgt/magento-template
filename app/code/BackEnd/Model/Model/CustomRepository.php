<?php
namespace BackEnd\Model\Model;

use BackEnd\Model\Api\CustomRepositoryInterface;
use BackEnd\Model\Api\Data\CustomDataInterface;
use BackEnd\Model\Model\CustomModelFactory;
use BackEnd\Model\Model\ResourceModel\CustomModel as ResourceModel;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class CustomRepository implements CustomRepositoryInterface
{
    protected $customModelFactory;
    protected $resourceModel;

    public function __construct(
        CustomModelFactory $customModelFactory,
        ResourceModel $resourceModel
    ) {
        $this->customModelFactory = $customModelFactory;
        $this->resourceModel = $resourceModel;
    }

    public function getById($id)
    {
        $customModel = $this->customModelFactory->create();
        $this->resourceModel->load($customModel, $id);
        if (!$customModel->getId()) {
            throw new NoSuchEntityException(__('Custom model with id "%1" does not exist.', $id));
        }
        return $customModel;
    }

    public function save(CustomDataInterface $customData)
    {
        try {
            $this->resourceModel->save($customData);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $customData;
    }
}