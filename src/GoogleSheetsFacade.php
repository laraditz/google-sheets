<?php

namespace Laraditz\GoogleSheets;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Laraditz\GoogleSheets\Skeleton\SkeletonClass
 */
class GoogleSheetsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'google-sheets';
    }
}
