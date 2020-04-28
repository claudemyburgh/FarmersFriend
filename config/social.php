<?php

return [

    'services' => [

        'github' => [
            'name' => 'Github'
        ],



    ],

    'events' => [

        'github' => [
            'created' => \App\Events\Social\GithubAccountWasLinked::class
        ],

        'google' => [
            'created' => ''
        ]

    ]

];
