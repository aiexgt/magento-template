<?php
namespace BackOffice\ConfigTemplate\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Datetime extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        // Agregar el campo de entrada de texto para la fecha y hora
        $html = $element->getElementHtml();
        
        // Agregar el selector de fecha y hora usando JavaScript
        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/ui", "mage/calendar"], function($) {
                $(document).ready(function() {
                    $("#' . $element->getHtmlId() . '").datetimepicker({
                        dateFormat: "yy-mm-dd",
                        timeFormat: "HH:mm:ss",
                        showButtonPanel: true,
                        changeMonth: true,
                        changeYear: true,
                        showTime: true
                    });
                });
            });
        </script>';
        
        return $html;
    }
}