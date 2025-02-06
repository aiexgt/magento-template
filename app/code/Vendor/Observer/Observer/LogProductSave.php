<?php
namespace Vendor\Observer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogProductSave implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Ejecuta el observer cuando se dispara el evento catalog_product_save_after.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // Obtiene el producto que se ha guardado.
        $product = $observer->getEvent()->getProduct();

        // Registra un mensaje en el log.
        $this->logger->info("Producto guardado: " . $product->getName() . " (ID: " . $product->getId() . ")");
    }
}