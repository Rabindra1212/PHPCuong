<?php

namespace PHPCuong\ProductOnSale\Model\Attribute\Source;

class OnSale extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('No'), 'value' => '1'],
                ['label' => __('Yes'), 'value' => '2']
            ];
        }
        return $this->_options;
    }
}
