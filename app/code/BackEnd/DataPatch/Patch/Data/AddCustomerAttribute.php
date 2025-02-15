<?php
namespace BackEnd\DataPatch\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCustomerAttribute implements DataPatchInterface
{
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function apply()
    {
        /** @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create();

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'custom_customer_attribute',
            [
                'type' => 'varchar',
                'label' => 'Custom Customer Attribute',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'sort_order' => 100,
                'position' => 100,
                'system' => false,
            ]
        );

        // Asignar el atributo al formulario de registro
        $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'custom_customer_attribute');
        $attribute->setData('used_in_forms', ['adminhtml_customer', 'customer_account_create']);
        $attribute->save();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}