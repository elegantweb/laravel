<?php

return [

    'name' => 'Admin',

    'logo-lg' => '<b>Elegant</b> Admin',
    'logo-mini' => '<b>E</b>Ad',

    'routes' => [
        'prefix' => env('ADMIN_URL_PREFIX', 'admin'),
        'middleware' => ['admin'],
    ],

    'auth' => [
        'guard' => 'admin',
        'password' => 'users',

        'routes' => [
            'prefix' => 'auth',
            'middleware' => ['admin.guest'],
        ],
    ],

    'panel' => [
        'skin' => 'skin-blue-light',
        'layout' => ['sidebar-mini'],

        'routes' => [
            'prefix' => '',
            'middleware' => ['admin.auth'],
        ],
    ],

];
