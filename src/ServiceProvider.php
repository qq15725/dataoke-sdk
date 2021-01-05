<?php

namespace Dataoke;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置
        $this->publishes([
            dirname(__DIR__) . '/config/dataoke.php' => function_exists('config_path')
                ? config_path('dataoke.php')
                : base_path('config/dataoke.php')
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('dataoke');
        }

        $this->mergeConfigFrom(dirname(__DIR__) . '/config/dataoke.php', 'dataoke');


        $this->app->singleton(Application::class, function ($app) {
            return new Application(
                null,
                null,
                null,
                $app->make('config')->get('dataoke', [])
            );
        });
    }
}
