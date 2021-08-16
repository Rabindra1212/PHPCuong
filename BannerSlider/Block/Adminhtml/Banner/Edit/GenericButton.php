<?php


namespace PHPCuong\BannerSlider\Block\Adminhtml\Banner\Edit;

use Magento\Framework\View\Element\UiComponent\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class GenericButton implements ButtonProviderInterface
{
  
    protected $context;

  
    protected $_authorization;

    public function __construct(
        Context $context,
        \Magento\Framework\AuthorizationInterface $authorization
    ) {
        $this->context = $context;
        $this->_authorization = $authorization;
    }


    public function getBannerId()
    {
        return (int)$this->context->getRequestParams('id');
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrl($route, $params);
    }

    public function getButtonData()
    {
        return [];
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
