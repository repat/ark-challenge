<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ark.io specific config
    |--------------------------------------------------------------------------
    */

    'nets' => [
        'main',
        'dev',
    ],

    // Select in app/Providers/AppServiceProvider.php
    'hosts' => [
        'main' => 'https://explorer.ark.io/api/',
        'dev' => 'https://dexplorer.ark.io/api/',
    ],

    'limits' => [
        'blocks' => 10,
        'transactions' => 10,
    ],
];
