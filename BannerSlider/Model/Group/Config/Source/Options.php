<?php

namespace PHPCuong\BannerSlider\Model\Group\Config\Source;

use Magento\Framework\Escaper;
use PHPCuong\BannerSlider\Model\GroupFactory as BannerGroupFactory;

class Options implements \Magento\Framework\Option\ArrayInterface
{
   
    protected $bannerGroupFactory;

  
    protected $escaper;

    public function __construct(BannerGroupFactory $bannerGroupFactory, Escaper $escaper)
    {
        $this->bannerGroupFactory = $bannerGroupFactory;
        $this->escaper = $escaper;
    }

    public function toOptionArray()
    {
        return $this->getAvailableGroups();
    }

    private function getAvailableGroups()
    {
        $collection = $this->bannerGroupFactory->create()->getCollection();
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getId(), 'label' => $this->escaper->escapeHtml($group->getName())];
        }
        return $result;
    }
}
