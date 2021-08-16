<?php


namespace PHPCuong\PriceDecimal\Helper;

/**
 * This class helps us to get the value from the configuration
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_PHPCUONG_PRICEDECIMAL_ENABLE = 'phpcuong_price_decimal/general/enable';
    const XML_PATH_PHPCUONG_PRICEDECIMAL_SHOW_DECIMAL = 'phpcuong_price_decimal/general/show_decimal';
    const XML_PATH_PHPCUONG_PRICEDECIMAL_DECIMAL_LENGTH = 'phpcuong_price_decimal/general/decimal_length';

    /**
     * Retrieve the enable
     *
     * @return boolean
     */
    public function isEnable()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_PHPCUONG_PRICEDECIMAL_ENABLE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve the show decimal
     *
     * @return boolean
     */
    public function showDecimal()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_PHPCUONG_PRICEDECIMAL_SHOW_DECIMAL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Retrieve the decimal length
     *
     * @return int
     */
    public function getDecimalLength()
    {
        return intval($this->scopeConfig->getValue(
            self::XML_PATH_PHPCUONG_PRICEDECIMAL_DECIMAL_LENGTH,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ));
    }
}
