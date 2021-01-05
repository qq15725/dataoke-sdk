<?php

namespace Dataoke\TbService;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['tbService'] = function ($app) {
            return new TbService($app);
        };
    }
}