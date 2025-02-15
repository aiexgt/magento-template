<?php
namespace BackOffice\ConfigTemplate\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Date extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        // Establecer el formato de fecha
        $element->setDateFormat('yyyy-MM-dd'); // Formato de fecha
        
        // Agregar el campo de entrada de texto para la fecha
        $html = $element->getElementHtml();
        
        // Agregar el selector de fecha usando JavaScript
        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/ui", "mage/calendar"], function($) {
                $(document).ready(function() {
                    $("#' . $element->getHtmlId() . '").datepicker({
                        dateFormat: "yy-mm-dd",
                        showButtonPanel: true,
                        changeMonth: true,
                        changeYear: true
                    });
                });
            });
        </script>';
        
        return $html;
    }
}