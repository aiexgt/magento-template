<?php
namespace Magento\ConfigTemplate\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class CustomOptions implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'option1', 'label' => __('Option 1')],
            ['value' => 'option2', 'label' => __('Option 2')],
            ['value' => 'option3', 'label' => __('Option 3')],
        ];
    }
}