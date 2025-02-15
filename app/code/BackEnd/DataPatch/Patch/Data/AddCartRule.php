<?php
namespace BackEnd\DataPatch\Patch\Data;

use Magento\SalesRule\Model\RuleFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCartRule implements DataPatchInterface
{
    private $ruleFactory;

    public function __construct(RuleFactory $ruleFactory)
    {
        $this->ruleFactory = $ruleFactory;
    }

    public function apply()
    {
        $rule = $this->ruleFactory->create();
        $rule->setName('Descuento del 10%')
             ->setDescription('Descuento del 10% en todos los productos')
             ->setIsActive(1)
             ->setWebsiteIds([1])
             ->setCustomerGroupIds([0, 1, 2, 3])
             ->setDiscountAmount(10)
             ->setSimpleAction('by_percent')
             ->setStopRulesProcessing(0)
             ->setSortOrder(0)
             ->setCouponType(2); // Sin cupón

        $rule->save();
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