<?php

return [

    'services' => [

        'github' => [
            'name' => 'Github'
        ],

        'google' => [
            'name' => 'Google'
        ],



    ],

    'events' => [

        'github' => [
            'created' => \App\Events\Social\GithubAccountWasLinked::class
        ],

        'google' => [
            'created' => \App\Events\Social\GoogleAccountWasLinked::class
        ]

    ]

];
