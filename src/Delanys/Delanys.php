<?php

namespace Dataoke\Delanys;

use SDK\Kernel\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Dataoke\Delanys\BrandClient $brand
 */
class Delanys extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["delanys.{$property}"])) {
            return $this->app["delanys.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Dataoke.Delanys service named "%s".', $property));
    }
}