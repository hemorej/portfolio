<?php

return [
    'timezone'  => 'America/Montreal',
	'thumbs' => [
		'quality'   => 90,
	],
    'debug'  => false,
    'auth' => [
        'trials' => 5,
        'challenges' => ['totp', 'email'],
        'methods' => [
            'password' => ['2fa' => true]
        ]
    ],
];