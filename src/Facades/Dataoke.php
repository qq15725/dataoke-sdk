<?php

namespace Dataoke\Facades;

use Illuminate\Support\Facades\Facade;
use Dataoke\Application;

/**
 * @method static \Dataoke\Goods\Goods goods()
 * @method static \Dataoke\TbService\TbService tbService()
 * @method static \Dataoke\Category\Category category()
 * @method static \Dataoke\Delanys\Delanys delanys()
 *
 * @mixin Application
 */
class Dataoke extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Application::class;
    }

    /**
     * @return Application
     */
    public static function getFacadeRoot()
    {
        return parent::getFacadeRoot();
    }

    /**
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (!$instance) {
            throw new \RuntimeException('A facade root has not been set.');
        }

        if ($instance->offsetExists($method)) {
            return $instance->offsetGet($method);
        }

        return $instance->$method(...$args);
    }
}
