<?php
namespace BackEnd\Model\Model\ResourceModel\CustomModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \BackEnd\Model\Model\CustomModel::class,
            \BackEnd\Model\Model\ResourceModel\CustomModel::class
        );
    }
}