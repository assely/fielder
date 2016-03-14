<?php

namespace Assely\Fielder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Assely\Fielder\Fielder
 */
class Field extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'fielder';
    }
}
