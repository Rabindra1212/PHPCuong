var config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'PHPCuong_HotDeals/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'PHPCuong_HotDeals/js/view/shipping-payment-mixin': true
            }
        }
    }
}
