<?php
namespace Magento\Model\Model\ResourceModel\CustomModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Magento\Model\Model\CustomModel::class,
            \Magento\Model\Model\ResourceModel\CustomModel::class
        );
    }
}