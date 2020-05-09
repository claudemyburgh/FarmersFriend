<?php


return [
    'defaults' => [
        'area' => 'south-africa'
    ],
    'img' => [
        'icon' => [
            'width' => 140,
            'height' => 140
        ],
        'thumb' => [
            'width' => 300,
            'height' => 300
        ],
        'thumb_big' => [
            'width' => 400,
            'height' => 400
        ],
        'card' => [
            'width' => 1000,
            'height' => 1000
        ]
    ],
    'auth' => [
        'name' => env('AUTH_USERNAME', 'Admin'),
        'email' => env('AUTH_EMAIL', 'admin@mail.com'),
        'password' => env('AUTH_PASSWORD', 'password')
    ],
    'authorized' => [
        env('AUTH_EMAIL', 'admin@mail.com'),
        'claudemyburgh@gmail.com'
    ]

];
