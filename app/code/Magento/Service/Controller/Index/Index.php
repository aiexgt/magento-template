<?php
namespace Magento\Service\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Service\Api\CustomServiceInterface;

class Index extends Action
{
    private $customService;

    public function __construct(
        Context $context,
        CustomServiceInterface $customService
    ) {
        parent::__construct($context);
        $this->customService = $customService;
    }

    public function execute()
    {
        $message = $this->customService->greet('Juan');
        echo $message;
    }
}