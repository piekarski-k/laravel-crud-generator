<?php

namespace PiekarskiK\LaravelCrudGenerator;

use Illuminate\Support\Facades\Facade;

class LaravelCrudGeneratorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-crud-generator';
    }
}