<?php


namespace PHPCuong\BannerSlider\Ui\Component\Listing\Column\Group;

use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use PHPCuong\BannerSlider\Model\GroupFactory as BannerGroupFactory;


class Options implements OptionSourceInterface
{
  
    protected $escaper;

    protected $bannerGroupFactory;

    protected $options;

    protected $currentOptions = [];

    public function __construct(BannerGroupFactory $bannerGroupFactory, Escaper $escaper)
    {
        $this->bannerGroupFactory = $bannerGroupFactory;
        $this->escaper = $escaper;
    }


    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }

        $this->options = $this->getAvailableGroups();

        return $this->options;
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
