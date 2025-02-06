<?php
namespace Vendor\Model\Model;

use Magento\Framework\Model\AbstractModel;
use Vendor\Model\Model\ResourceModel\CustomModel as ResourceModel;

class CustomModel extends AbstractModel implements \Vendor\Model\Api\Data\CustomDataInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function setId($id)
    {
        return $this->setData('id', $id);
    }

    public function getName()
    {
        return $this->getData('name');
    }

    public function setName($name)
    {
        return $this->setData('name', $name);
    }
}