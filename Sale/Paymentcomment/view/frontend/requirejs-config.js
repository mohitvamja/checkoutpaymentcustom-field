var config = {
config: {
    mixins: {
        'Magento_Checkout/js/action/place-order': {
            'Sale_Paymentcomment/js/order/place-order-mixin': true
        },
        'Magento_Checkout/js/action/set-payment-information': {
            'Sale_Paymentcomment/js/order/set-payment-information-mixin': true
        }
    }
}
};