<?php

namespace App\Bussiness\Facades;

use Illuminate\Support\Facades\Facade;

class FormhandlerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'form-handler';
    }
}
