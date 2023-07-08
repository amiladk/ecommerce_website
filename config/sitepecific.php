<?php

if($_ENV['APP_ENV'] == 'live') {

    return [
        'api_url'         => 'https://api.webstoresl.com/api/auth/',
    
        'api_url_v2'      => 'https://api.webstoresl.com/api/auth/v2/',
    
        'merchant_id'     => '213564',
    
        'return_url'      => 'https://www.aryanselectronics.com/order-success',
    
        'cancel_url'      => 'https://www.aryanselectronics.com/order-success',
    
        'notify_url'      => 'https://api.webstoresl.com/api/auth/v2/payhere-notify',
    
        'franchise'       => '31',
    
        'action_url'      => 'https://www.payhere.lk/pay/checkout',
    ];
   
}
elseif($_ENV['APP_ENV'] == 'test'){
    return [
        'api_url'         => 'https://ecommerce-api.webtest123.xyz/api/auth/',

        'api_url_v2'      => 'https://ecommerce-api.webtest123.xyz/api/auth/v2/',

        'merchant_id'     => '213564',

        'return_url'      => 'hhttps://aryanselectronics.webtest123.xyz/order-success',

        'cancel_url'      => 'https://aryanselectronics.webtest123.xyz/order-success',

        'notify_url'      => 'https://ecommerce-api.webtest123.xyz/api/auth/v2/payhere-notify',

        'franchise'       => '31',

        'action_url'      => 'https://sandbox.payhere.lk/pay/checkout',
    ];
}
else{

    return [
        'api_url'         => 'http://localhost/api_ecommerce/ecommerce-api/foyo/public/index.php/api/auth/',

        'api_url_v2'      => 'http://localhost/api/public/index.php/api/auth/v2/',

        'merchant_id'     => '1212934',

        'return_url'      => 'https://aryans.dropx.lk/order-success',

        'cancel_url'      => 'https://aryans.dropx.lk/order-success',

        'notify_url'      => 'https://newbackend.dropx.lk/api/auth/v2/payhere-notify',

        'franchise'       => '31',

        'action_url'      => 'https://sandbox.payhere.lk/pay/checkout',
    ];

}

