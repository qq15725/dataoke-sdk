<?php

namespace Dataoke;

use SDK\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @link http://www.dataoke.com/pmc/openapi.html
 *
 * @property \Dataoke\Goods\GoodsClient $goods 商品
 */
class Application extends ServiceContainer
{
    const LAST_VERSION = 'v1.2.4';

    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        Goods\ServiceProvider::class,
    ];

    /**
     * @var array
     */
    protected $defaultConfig = [
        'http' => [
            'timeout' => 10.0,
            'base_uri' => 'https://openapi.dataoke.com'
        ],
    ];

    public function __construct(
        string $appkey = null,
        string $appsecret = null,
        $version = null,
        array $config = [],
        array $prepends = []
    )
    {
        $config = array_merge([
            'appkey' => $appkey,
            'appsecret' => $appsecret,
            'version' => $version ?: self::LAST_VERSION,
        ], $config);
        parent::__construct($config, $prepends);
    }
}