<?php

namespace Dataoke\Facades;

use Illuminate\Support\Facades\Facade;
use Dataoke\Application;

/**
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
}
