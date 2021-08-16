<?php

namespace PHPCuong\BannerSlider\Controller\Adminhtml\Banner;

class Delete extends \Magento\Backend\App\Action
{
  
    const ADMIN_RESOURCE = 'PHPCuong_BannerSlider::banner_delete';


    public function execute()
    {
        // check if we know what should be deleted
        $bannerId = (int)$this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($bannerId && (int) $bannerId > 0) {
            try {
                $model = $this->_objectManager->create('PHPCuong\BannerSlider\Model\Banner');
                $model->load($bannerId);
                $model->delete();
                $this->messageManager->addSuccess(__('The Banner has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to the question grid
                return $resultRedirect->setPath('*/*/index');
            }
        }
        // display error message
        $this->messageManager->addError(__('Banner doesn\'t exist any longer.'));
        // go to the question grid
        return $resultRedirect->setPath('*/*/index');
    }
}
