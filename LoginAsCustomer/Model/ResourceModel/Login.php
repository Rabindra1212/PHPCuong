<?php

namespace PHPCuong\LoginAsCustomer\Model\ResourceModel;

class Login extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('phpcuong_login_as_customer', 'login_id');
    }
}
