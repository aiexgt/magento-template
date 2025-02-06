<?php
namespace Vendor\Model\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomModel extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('vendor_model_custom', 'id');
    }
}