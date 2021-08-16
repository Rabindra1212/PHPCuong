<?php

namespace PHPCuong\CustomerCondition\Observer;

class CustomerConditionObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * Execute observer.
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $additional = $observer->getAdditional();
        $conditions = (array) $additional->getConditions();

        // Merging the old condition with our condition.
        $conditions = array_merge_recursive($conditions, [
            [
                'value'=> [
                    [
                        'value' => \PHPCuong\CustomerCondition\Model\Rule\Condition\Customer\Gender::class,
                        'label' => __('Gender')
                    ]
                ],
                'label'=> __('Customer Condition')
            ]
        ]);

        $additional->setConditions($conditions);
        return $this;
    }
}
