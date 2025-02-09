<?php
namespace Vendor\DataPatch\Patch\Data;

use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Customer\Model\GroupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCustomerGroup implements DataPatchInterface
{
    private $groupFactory;
    private $groupRepository;

    public function __construct(
        GroupFactory $groupFactory,
        GroupRepositoryInterface $groupRepository
    ) {
        $this->groupFactory = $groupFactory;
        $this->groupRepository = $groupRepository;
    }

    public function apply()
    {
        $group = $this->groupFactory->create();
        $group->setCode('Nuevo Grupo')
              ->setTaxClassId(3); // ID de la clase de impuesto

        $this->groupRepository->save($group);
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