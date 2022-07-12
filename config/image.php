<?php
use Bagoesz21\LaravelImageHandler\Config\ConfigBuilder;

$imgDisk = env('IMAGE_DISK', 'default');
$defaultQueue = env('IMAGE_QUEUE_NAME', 'default');
$defaultQueueConnection = env('IMAGE_QUEUE_CONNECTION', env('QUEUE_CONNECTION', 'redis'));
$imgDefault = env('IMAGE_DEFAULT_URL');

$config = [
    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Supported: "gd", "imagick"
    | "GD Library" and "Imagick" to manipulate image. By default PHP's "GD Library" implementation is used.
    |
    */

    'driver' => 'gd',

    'default' => [
        'url' => $imgDefault
    ],

    'queue' => [
        'enabled' => (bool) env('IMAGE_QUEUE_ENABLED', false),
        'name' => $defaultQueue,
        'connection' => $defaultQueueConnection,
    ],

    'filesystem' => [
        'disk' => $imgDisk,

        'path' => '/'
    ],

    'settings' => [
        'default' => [
            'disk' => $imgDisk,
            'path' => '',

            /**
             * Sizes: [width, height]
             */
            'sizes' => [
                'xs' => [32, 32],
                's' => [64, 64],
                'm' => [128, 128],
                'l' => [256, 256],
            ],

            'options' => []
        ]
    ],

    'optimizers' => [
    ],

    /**
     * If you want custom config image.
     * For example if you need load stored config in database,
     * load config and mapping config with mapper config class.
     * Default: load from config.
     */
    'mapper' => Bagoesz21\LaravelImageHandler\Config\Mapper\ConfigMapper::class,
];
return $config;

return ConfigBuilder::make()
    ->queue($config['queue'])
    ->config($config)
    ->other([])
    ->build();

