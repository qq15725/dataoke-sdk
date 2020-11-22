<?php

namespace Dataoke\Tbk;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['taobao'] = function ($app) {
            return new TbkClient($app);
        };
    }
}