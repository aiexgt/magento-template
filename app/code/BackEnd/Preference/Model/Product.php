<?php
namespace BackEnd\Preference\Model;

use Magento\Catalog\Model\Product as CoreProduct;

class Product extends CoreProduct
{
    /**
     * Sobreescribe el método getName() para modificar su comportamiento.
     *
     * @return string
     */
    public function getName()
    {
        // Llama al método original y modifica el resultado.
        $originalName = parent::getName();
        return "Producto Personalizado: " . $originalName;
    }
}