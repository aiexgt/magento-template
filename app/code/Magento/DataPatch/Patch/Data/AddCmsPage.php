<?php
namespace Magento\DataPatch\Patch\Data;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddCmsPage implements DataPatchInterface
{
    private $pageFactory;
    private $pageRepository;

    public function __construct(
        PageFactory $pageFactory,
        PageRepositoryInterface $pageRepository
    ) {
        $this->pageFactory = $pageFactory;
        $this->pageRepository = $pageRepository;
    }

    public function apply()
    {
        $page = $this->pageFactory->create();
        $page->setTitle('Nueva Página CMS')
             ->setIdentifier('nueva-pagina-cms')
             ->setContent('<p>Contenido de la nueva página CMS.</p>')
             ->setIsActive(true)
             ->setPageLayout('1column')
             ->setStoreId([0]); // Todas las tiendas

        $this->pageRepository->save($page);
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