<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ark.io specific config
    |--------------------------------------------------------------------------
    */

    // Select in app/Providers/AppServiceProvider.php
    'host_main' => 'https://explorer.ark.io/api/',
    'host_dev' => 'https://dexplorer.ark.io/api/',

    'limits' => [
        'blocks' => 10,
        'transactions' => 10,
    ],
];