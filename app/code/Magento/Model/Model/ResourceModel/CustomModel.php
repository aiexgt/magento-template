<?php
namespace Magento\Model\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomModel extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('magento_model_custom', 'id');
    }
}