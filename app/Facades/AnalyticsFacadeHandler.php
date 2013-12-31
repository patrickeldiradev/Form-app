<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AnalyticsFacadeHandler extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'analytics-facade';
    }
}
