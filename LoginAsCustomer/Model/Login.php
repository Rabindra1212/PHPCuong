<?php

namespace PHPCuong\LoginAsCustomer\Model;

class Login extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PHPCuong\LoginAsCustomer\Model\ResourceModel\Login');
    }
}
