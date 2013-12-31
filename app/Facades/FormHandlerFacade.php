<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FormHandlerFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'form-facade';
    }
}
