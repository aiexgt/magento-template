<?php
namespace Vendor\Model\Model\ResourceModel\CustomModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Vendor\Model\Model\CustomModel::class,
            \Vendor\Model\Model\ResourceModel\CustomModel::class
        );
    }
}