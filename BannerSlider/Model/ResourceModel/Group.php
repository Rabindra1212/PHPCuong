<?php


namespace PHPCuong\BannerSlider\Model\ResourceModel;

class Group extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
 
    protected function _construct()
    {
        $this->_init('phpcuong_banners_slider_group', 'id');
    }
}
