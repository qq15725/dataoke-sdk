<?php

namespace Dataoke\Dels\Jd;

use SDK\Kernel\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Dataoke\Dels\Jd\Kit\Kit $kit
 */
class Jd extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["dels.jd.{$property}"])) {
            return $this->app["dels.jd.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Dataoke.Dels.Jd service named "%s".', $property));
    }
}