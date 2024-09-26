<?php
namespace Vendor\NewProductTag\Plugin;

use Magento\Catalog\Block\Product\View as ProductView;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Pricing\Helper\Data as PriceHelper;

class ProductViewPlugin
{
    protected $dateTime;
    protected $priceHelper;

    public function __construct(
        DateTime $dateTime,
        PriceHelper $priceHelper
    ) {
        $this->dateTime = $dateTime;
        $this->priceHelper = $priceHelper;
    }

    public function afterGetProduct(ProductView $subject, $product)
    {
        // Aqui buscamos cuando se creo el producto y a continuacion calculamos la diferencia de dias
        $createdDate = $product->getCreatedAt();
        $currentDate = $this->dateTime->gmtDate();
        $daysDifference = (strtotime($currentDate) - strtotime($createdDate)) / (60 * 60 * 24);

        // Ahora tomamos la decisión en base a los dias que han pasado
        if ($daysDifference <= 7) {
            $product->setData('is_new', true);
        } else {
            $product->setData('is_new', false);
        }

        return $product;
    }
}
