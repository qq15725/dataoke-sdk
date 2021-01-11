<?php

namespace Dataoke\Dels;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['dels'] = function ($app) {
            /** @var \Dataoke\Application $app */
            $app->registerProviders([
                Jd\ServiceProvider::class,
            ]);

            return new Dels($app);
        };
    }
}