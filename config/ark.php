<?php

declare(strict_types=1);

/*
 * This file is part of Ark Laravel.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'host'        => 'https://explorer.ark.io/api/',
            'api_version' => 1,
        ],

        'dev' => [
            'host'        => 'https://dexplorer.ark.io/api/',
            'api_version' => 1,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Other config not generated by ArkServiceProvider
    |--------------------------------------------------------------------------
    */
    'limits' => [
        'blocks' => 10,
        'transactions' => 10,
        'default' => 10,
    ],

    'blockchain_update_seconds' => 8,
    'long_id_length' => 7, // shorten IDs/wallets to this length

    'linked_keys' => [
        'wallet' => [
            'sender',
            'recipient'
        ],
        'block' => [
            'blockId',
            'previous',
        ],
    ],
    'cta' => 'ark:', // for href links
];
