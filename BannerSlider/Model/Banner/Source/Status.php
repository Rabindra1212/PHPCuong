<?php


namespace PHPCuong\BannerSlider\Model\Banner\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
  
    protected $banner;

    public function __construct(\PHPCuong\BannerSlider\Model\Banner $banner)
    {
        $this->banner = $banner;
    }

    public function toOptionArray()
    {
        $availableOptions = $this->banner->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
