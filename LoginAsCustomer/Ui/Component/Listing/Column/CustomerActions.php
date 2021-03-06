<?php

namespace PHPCuong\LoginAsCustomer\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class CustomerActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var \Magento\Framework\AuthorizationInterface
     */
    protected $_authorization;

    /**
     * @var string
     */
    protected $sourceColumnName = 'entity_id';

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (!empty($item[$this->sourceColumnName])) {
                    $item[$this->getData('name')]['edit'] = [
                        // This is the URL is used on the backend for processing login as a customer
                        // phpcuong_loginascustomer is the route
                        // login is the controller name
                        // index is the action name
                        'href' => $this->urlBuilder->getUrl(
                            'phpcuong_loginascustomer/login/index',
                            ['customer_id' => $item[$this->sourceColumnName]]
                        ),
                        'label' => __('Login as Customer'),
                        'target' => '_blank',
                    ];
                }
            }
        }

        return $dataSource;
    }
}
