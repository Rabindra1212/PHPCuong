<?php

namespace PHPCuong\OfflinePayments\Block\Info;

class PdqPayment extends \Magento\Payment\Block\Info
{
    /**
     * @var string
     */
    protected $_template = 'PHPCuong_OfflinePayments::info/pdqpayment.phtml';

    /**
     * @return string
     */
    public function toPdf()
    {
        $this->setTemplate('PHPCuong_OfflinePayments::info/pdf/pdqpayment.phtml');
        return $this->toHtml();
    }
}
