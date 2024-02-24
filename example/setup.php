<?php

require_once __DIR__ . '/../vendor/autoload.php';

// configuration object
$config = new \EctemaApi\Config([
    'apiUrl'    => 'https://perf.ectema.com/api',
    'apiKey'    => 'PUBLIC-KEY',

    // components
    'components' => [
        'cache' => [
            'class'     => \EctemaApi\Cache\File::class,
            'filesPath' => __DIR__ . '/data/cache', // make sure it is writable by webserver
        ]
    ],
]);

// now inject the configuration and we are ready to make api calls
\EctemaApi\Base::setConfig($config);

// start UTC
date_default_timezone_set('UTC');
