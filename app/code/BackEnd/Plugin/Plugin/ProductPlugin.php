<?php
namespace BackEnd\Plugin\Plugin;

class ProductPlugin
{
    /**
     * Se ejecuta antes de getName().
     *
     * @param \Magento\Catalog\Model\Product $subject
     */
    public function beforeGetName(\Magento\Catalog\Model\Product $subject)
    {
        // Puedes realizar alguna acción antes de que se llame a getName().
        // Nota: No puedes modificar el valor de retorno aquí, solo modificar el estado del objeto.
    }

    /**
     * Se ejecuta después de getName().
     *
     * @param \Magento\Catalog\Model\Product $subject
     * @param string $result
     * @return string
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        // Modifica el nombre del producto agregando un prefijo.
        return "Producto: " . $result;
    }
}
