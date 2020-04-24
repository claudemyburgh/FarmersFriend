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
            'height' => 225
        ],
        'thumb_big' => [
            'width' => 400,
            'height' => 300
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
