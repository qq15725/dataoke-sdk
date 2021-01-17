<?php

namespace Dataoke\Dels\Jd\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['dels.jd.order'] = function ($app) {
            return new Order($app);
        };
    }
}