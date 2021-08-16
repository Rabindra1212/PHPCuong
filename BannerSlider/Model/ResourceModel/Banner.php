<?php


namespace PHPCuong\BannerSlider\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\ObjectManager;
use PHPCuong\BannerSlider\Model\Banner\ImageUploader;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
  
    protected $_imageUploader;

   
    protected function _construct()
    {
        $this->_init('phpcuong_banners_slider', 'id');
    }

    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $name = $object->getName();
        $url = $object->getUrl();
        $image = $object->getImage();
        $groupId = $object->getGroupId();
        $order = $object->getOrder();

        if (empty($name)) {
            throw new LocalizedException(__('The banner name is required.'));
        }

        if (is_array($image)) {
            $object->setImage($image[0]['name']);
        }

        // if the URL not null then check the URL
        if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new LocalizedException(__('The URL Link is invalid.'));
        }

        if (!is_numeric($groupId)) {
            throw new LocalizedException(__('The Group Name is required.'));
        }

        if (!empty($order) && !is_numeric($order)) {
            throw new LocalizedException(__('The Sort Order must be a numeric.'));
        }

        return $this;
    }

   
    protected function _afterDelete(\Magento\Framework\Model\AbstractModel $object)
    {
        $imageName = $object->getImage();
        $this->_getImageUploader()->deleteImage($imageName);

        return $this;
    }


    private function _getImageUploader()
    {
        if ($this->_imageUploader === null) {
            $this->_imageUploader = ObjectManager::getInstance()->get(ImageUploader::class);
        }
        return $this->_imageUploader;
    }
}
