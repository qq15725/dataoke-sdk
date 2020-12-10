<?php

namespace Dataoke\Delanys;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['delanys'] = function ($app) {
            return new Delanys($app);
        };

        $app['delanys.brand'] = function ($app) {
            return new BrandClient($app);
        };
    }
}