<?php

namespace Dataoke\Goods;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['goods'] = function ($app) {
            return new GoodsClient($app);
        };
    }
}