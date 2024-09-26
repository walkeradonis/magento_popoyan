<?php
namespace Vendor\FeaturedProducts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;

class ProductList extends Template
{
    protected $productRepository;
    protected $searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    public function getFeaturedProducts()
    {
        // Limitar a 5 productos aleatorios
        $this->searchCriteriaBuilder->setPageSize(5);

        // Crear el criterio de búsqueda
        $searchCriteria = $this->searchCriteriaBuilder->create();

        // Obtener productos
        $products = $this->productRepository->getList($searchCriteria)->getItems();

        return $products;
    }

    public function getImageUrl($product)
    {
        return $this->getUrl('pub/media/catalog/product') . $product->getImage();
    }

    public function getPriceCurrency()
    {
        return $this->_storeManager->getStore()->getCurrentCurrency();
    }
}
