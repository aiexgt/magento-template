<?php
namespace Magento\DataPatch\Patch\Data;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\Store;

class AddCategory implements DataPatchInterface
{
    private $categoryFactory;
    private $categoryRepository;

    public function __construct(
        CategoryFactory $categoryFactory,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
    }

    public function apply()
    {
        $category = $this->categoryFactory->create();
        $category->setName('Nueva Categoría')
                ->setParentId(2) // ID de la categoría raíz
                ->setIsActive(true)
                ->setIncludeInMenu(true)
                ->setStoreId(Store::DEFAULT_STORE_ID);

        $this->categoryRepository->save($category);
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