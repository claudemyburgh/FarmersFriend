<?php


return [
    'defaults' => [
        'area' => 'south-africa'
    ],
    'img' => [
        'icon' => [
            'width' => 100,
            'height' => 100
        ],
        'thumb' => [
            'width' => 280,
            'height' => 200
        ],
        'thumb_big' => [
            'width' => 400,
            'height' => 260
        ],
        'card' => [
            'width' => 800,
            'height' => 600
        ]
    ],
    'auth' => [
        'name' => env('AUTH_USERNAME', 'Admin'),
        'email' => env('AUTH_EMAIL', 'admin@mail.com'),
        'password' => env('AUTH_PASSWORD', 'password')
    ]

];
