<?php


namespace PHPCuong\BannerSlider\Block\Adminhtml\Banner\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        $data = [];
        if ($this->getBannerId() && $this->_isAllowedAction('PHPCuong_BannerSlider::banner_delete')) {
            $data = [
                'label' => __('Delete Banner'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

 
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getBannerId()]);
    }
}
