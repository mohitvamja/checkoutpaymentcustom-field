<?php
namespace Sale\Yesno\Plugin\Checkout;


use Magento\Checkout\Block\Checkout\LayoutProcessor;

class LayoutProcessorPlugin
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function afterProcess(LayoutProcessor $subject, array $jsLayout)
    {
        //  $value =  $this->helper->getPaycomment();
        //  foreach ($value as $data) {
        //      $opt[] = array(
        //            'value' => $data,
        //            'label' => $data
        //        );
        //    }
        // $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
        //     ['payment']['children']['payments-list']['children']['before-place-order']['children']['paycomment'] = [
        //         'component' => 'Magento_Ui/js/form/element/select',
        //         'config' => [
        //             'customScope' => 'shippingAddress',
        //             'template' => 'ui/form/field',
        //              'elementTmpl' => 'ui/form/element/select',
        //             'id' => 'paycomment'
        //         ],
        //         'dataScope' => 'paycomment',
        //         'label' => 'paycomment Comment',
        //         'notice' => __('paycomment'),
        //         'provider' => 'checkoutProvider',
        //         'visible' => true,
        //         'sortOrder' => 250,
        //         'id' => 'paycomment',
        //         'options' =>  $opt
        //     ];


            //  $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
            // ['payment']['children']['payments-list']['children']['before-place-order']['children']['paycommenttextarea'] = [
            //     'component' => 'Magento_Ui/js/form/element/textarea',
            //     'config' => [
            //         'customScope' => 'shippingAddress',
            //         'template' => 'ui/form/field',
            //         'options' => [],
            //         'id' => 'paycommenttextarea'
            //     ],
            //     'dataScope' => 'paycommenttextarea',
            //     'label' => 'paycommenttextarea',
            //     'notice' => __('paycommenttextarea'),
            //     'provider' => 'checkoutProvider',
            //     'visible' => true,
            //     'sortOrder' => 110,
            //     'id' => 'paycommenttextarea'
            // ];


            $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
            ['payment']['children']['payments-list']['children']['before-place-order']['children']['yesno'] = [
                'component' => 'Magento_Ui/js/form/element/select',
                'config' => [
                    'customScope' => 'shippingAddress',
                    'template' => 'ui/form/field',
                     'elementTmpl' => 'ui/form/element/select',
                    'id' => 'yesno'
                ],
                'dataScope' => 'yesno',
                'label' => 'yesno',
                'notice' => __('yesno'),
                'provider' => 'checkoutProvider',
                'visible' => true,
                'sortOrder' => 270,
                'id' => 'yesno',
                'options' => [
                [
                    'value' => '0',
                    'label' => 'No',
                ],
                [
                    'value' => '1',
                    'label' => 'Yes',
                ]
            ]
            ];




        return $jsLayout;
    }
}