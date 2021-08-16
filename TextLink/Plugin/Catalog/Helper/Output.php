<?php

namespace PHPCuong\TextLink\Plugin\Catalog\Helper;

class Output
{
   
    protected $_eavConfig;

    protected $_urlInterface;

    public function __construct(
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Framework\UrlInterface $urlInterface
    ) {
        $this->_eavConfig = $eavConfig;
        $this->_urlInterface = $urlInterface;
    }

    public function aroundProductAttribute(
        \Magento\Catalog\Helper\Output $output,
        callable $proceed,
        \Magento\Catalog\Model\Product $product,
        $attributeHtml,
        $attributeName
    ) {
        $result = $proceed($product, $attributeHtml, $attributeName);
        $attribute = $this->_eavConfig->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $attributeName);
        if ($attribute &&
            $attribute->getId() &&
            ($attribute->getAttributeCode() == 'description' || $attribute->getAttributeCode() == 'short_description')
        ) {
            $textLink = 'black';
            $textLinkUrl = $this->_urlInterface->getUrl('catalogsearch/result', ['q' => $textLink]);
            $result = preg_replace('/'.$textLink.'/i', '<a href="'.$textLinkUrl.'"><b>'.$textLink.'</b></a>', $result);
        }

        return $result;
    }
}
