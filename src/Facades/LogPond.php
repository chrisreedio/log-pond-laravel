<?php

namespace ChrisReedIO\LogPond\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\LogPond\LogPondConnector
 */
class LogPond extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\LogPond\LogPondConnector::class;
    }
}
