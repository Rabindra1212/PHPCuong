<?php

namespace PHPCuong\OfflinePayments\Block\Form;

class PdqPayment extends \Magento\Payment\Block\Form
{
    /**
     * PDQ Payment template
     * This is used for both frontend and backend
     * I created two files named pdqpayment.phtml in the path view\adminhtml\templates\form and view\frontend\templates\form because it has different content.
     *
     * @var string
     */
    protected $_template = 'PHPCuong_OfflinePayments::form/pdqpayment.phtml';
}
