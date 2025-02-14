<?php
namespace FrontEnd\Block\Block;

use Magento\Framework\View\Element\Template;

class HomeBlock extends Template
{
    public function getWelcomeMessage()
    {
        return "Welcome to our custom block on the homepage!";
    }
}
