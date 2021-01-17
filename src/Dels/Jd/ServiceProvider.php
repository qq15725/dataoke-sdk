<?php

namespace Dataoke\Dels\Jd;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['dels.jd'] = function ($app) {
            /** @var \Dataoke\Application $app */
            $app->registerProviders([
                Kit\ServiceProvider::class,
                Order\ServiceProvider::class,
            ]);

            return new Jd($app);
        };
    }
}