<?php

namespace ChrisReedIO\LogPond\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\LogPond\LogPond
 */
class LogPond extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\LogPond\LogPond::class;
    }
}
