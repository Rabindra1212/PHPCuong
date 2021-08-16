<?php


namespace PHPCuong\BannerSlider\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Image extends \Magento\Ui\Component\Listing\Columns\Column
{
  
    const URL_PATH_EDIT = 'phpcuong_banners_slider/banner/edit';

    protected $banner;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \PHPCuong\BannerSlider\Model\Banner $banner,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
        $this->banner = $banner;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $banner = new \Magento\Framework\DataObject($item);
                $item[$fieldName . '_src'] = $this->banner->getImageUrl($banner['image']);
                $item[$fieldName . '_orig_src'] = $this->banner->getImageUrl($banner['image']);
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    self::URL_PATH_EDIT,
                    ['id' => $banner['id']]
                );
                $item[$fieldName . '_alt'] = $banner['name'];
            }
        }
        return $dataSource;
    }
}
