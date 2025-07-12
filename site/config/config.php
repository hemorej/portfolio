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
    'd4l' => [
      'static_site_generator' => [
        'endpoint' => 'generate-static-site', # set to any string like 'generate-static-site' to use the built-in endpoint (necessary when using the blueprint field)
        'output_folder' => './static', # you can specify an absolute or relative path
        'preserve' => [], # preserve individual files / folders in the root level of the output folder (anything starting with "." is always preserved)
        'base_url' => '/', # if the static site is not mounted to the root folder of your domain, change accordingly here
        'skip_media' => false, # set to true to skip copying media files, e.g. when they are already on a CDN; combinable with 'preserve' => ['media']
        'skip_templates' => [], # ignore pages with given templates (home is always rendered)
        'custom_routes' => [], # see below for more information on custom routes
        'custom_filters' => [], # see below for more information on custom filters
        'ignore_untranslated_pages' => false, # set to true to ignore pages without an own language
        'index_file_name' => 'index.html' # you can change the directory index file name, e.g. to 'index.json' when generating an API
      ]
    ]
];