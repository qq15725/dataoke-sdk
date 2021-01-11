<?php

namespace Dataoke\Dels\Jd\Kit;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['dels.jd.kit'] = function ($app) {
            return new Kit($app);
        };
    }
}