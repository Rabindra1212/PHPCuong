<?php

namespace PHPCuong\LoginAsCustomer\Model\ResourceModel\Login;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('PHPCuong\LoginAsCustomer\Model\Login', 'PHPCuong\LoginAsCustomer\Model\ResourceModel\Login');
    }
}
