<?php

return [

    'services' => [

        'github' => [
            'name' => 'Github'
        ],

        'google' => [
            'name' => 'Google'
        ],

        'facebook' => [
            'name' => 'Facebook'
        ],



    ],

    'events' => [

        'github' => [
            'created' => \App\Events\Social\GithubAccountWasLinked::class
        ],

        'google' => [
            'created' => \App\Events\Social\GoogleAccountWasLinked::class
        ],

        'facebook' => [
            'created' => \App\Events\Social\FacebookAccountWasLinked::class
        ]

    ]

];
