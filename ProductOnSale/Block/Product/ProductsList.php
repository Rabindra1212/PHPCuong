<?php

namespace PHPCuong\ProductOnSale\Block\Product;

class ProductsList extends \Magento\CatalogWidget\Block\Product\ProductsList
    implements \Magento\Widget\Block\BlockInterface
{
    /**
     * Prepare and return product collection
     *
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function createCollection()
    {
        /** @var $collection \Magento\Catalog\Model\ResourceModel\Product\Collection */
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*')->addAttributeToFilter(
            'status', ['in' => [\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED]]
        )->setVisibility(
            $this->catalogProductVisibility->getVisibleInCatalogIds()
        )->addAttributeToFilter(
            'on_sale', '2'
        )->setPageSize($this->getProductsCount())->setCurPage(1);

        return $collection;
    }

    /**
     * Retrieve how many products should be displayed
     *
     * @return int
     */
    public function getProductsCount()
    {
        $limit = (int)$this->getData('products_count');
        if ($limit <= 0) {
            return 10;
        }
        return $limit;
    }

    /**
     * Render pagination HTML
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return '';
    }
}
