<?php
namespace Vendor\DataPatch\Patch\Data;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\Store;

class AddProduct implements DataPatchInterface
{
    private $productFactory;
    private $productRepository;

    public function __construct(
        ProductFactory $productFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
    }

    public function apply()
    {
        $product = $this->productFactory->create();
        $product->setSku('nuevo-producto')
                ->setName('Nuevo Producto')
                ->setAttributeSetId(4) // ID del conjunto de atributos
                ->setPrice(19.99)
                ->setVisibility(4) // Visibilidad (catalogo y búsqueda)
                ->setStatus(1) // Habilitado
                ->setTypeId('simple') // Tipo de producto
                ->setStockData([
                    'use_config_manage_stock' => 1,
                    'qty' => 100,
                    'is_in_stock' => 1
                ]);

        $this->productRepository->save($product);
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