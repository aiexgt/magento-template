<?php

namespace BackEnd\CustomLogger\Controller\Example;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use BackEnd\CustomLogger\Model\CustomLogger;

class Log extends Action
{
    /**
     * @var CustomLogger
     */
    protected $customLogger;

    /**
     * Log constructor.
     *
     * @param Context $context
     * @param CustomLogger $customLogger
     */
    public function __construct(
        Context $context,
        CustomLogger $customLogger
    ) {
        parent::__construct($context);
        $this->customLogger = $customLogger;
    }

    /**
     * Execute the action.
     */
    public function execute()
    {
        // Registra un mensaje en el archivo de log personalizado
        $this->customLogger->log('Este es un mensaje de log personalizado.');

        // Puedes agregar más lógica aquí si es necesario
    }
}