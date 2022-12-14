<?php

namespace Towoju5\Reloadly;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Towoju5\Reloadly\Skeleton\SkeletonClass
 */
class ReloadlyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'reloadly';
    }
}
