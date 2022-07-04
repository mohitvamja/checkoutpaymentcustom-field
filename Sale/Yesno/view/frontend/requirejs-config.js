var config = {
config: {
    mixins: {
        'Magento_Checkout/js/action/place-order': {
            'Sale_Yesno/js/order/yesno-place-order-mixin': true
        },
        'Magento_Checkout/js/action/set-payment-information': {
            'Sale_Yesno/js/order/yesno-set-payment-information-mixin': true
        }
    }
}
};