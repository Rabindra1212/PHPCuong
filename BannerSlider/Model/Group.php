<?php

namespace PHPCuong\BannerSlider\Model;

use Magento\Framework\Exception\LocalizedException;

class Group extends \Magento\Framework\Model\AbstractModel
{
  
    const CACHE_TAG = 'phpcuong_banners_slider_group';

    protected function _construct()
    {
        $this->_init('PHPCuong\BannerSlider\Model\ResourceModel\Group');
    }

  
    public function beforeSave()
    {
        $groupName = $this->getData('name');
        $groupId = (int)$this->getData('id');
        $collection = $this->getCollection()->addFieldToFilter('name', $groupName);
        if ($groupId) {
            $collection = $collection->addFieldToFilter('id', ['neq' => $groupId]);
        }
        $group = $collection->getFirstItem();
        if ($group->getId()) {
            throw new LocalizedException(__('The Group Name has already existed.'));
        }
        parent::beforeSave();
        return $this;
    }
}
