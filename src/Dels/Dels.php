<?php

namespace Dataoke\Dels;

use SDK\Kernel\BaseClient;
use SDK\Kernel\Exceptions\InvalidArgumentException;

/**
 * @property \Dataoke\Dels\Jd\Jd $jd
 */
class Dels extends BaseClient
{
    /**
     * @param $property
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function __get($property)
    {
        if (isset($this->app["dels.{$property}"])) {
            return $this->app["dels.{$property}"];
        }

        throw new InvalidArgumentException(sprintf('No Dataoke.Dels service named "%s".', $property));
    }
}