<?php


namespace PHPCuong\BannerSlider\Controller\Adminhtml\Banner;

class Index extends \Magento\Backend\App\Action
{
   
    const ADMIN_RESOURCE = 'PHPCuong_BannerSlider::all_banners';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('PHPCuong_BannerSlider::all_banners')
            ->addBreadcrumb(
                __('Banners Slider'), __('Banners Slider')
            )->getConfig()->getTitle()->prepend(__('All Banners'));

        return $resultPage;
    }
}
