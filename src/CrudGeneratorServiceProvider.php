<?php

namespace PiekarskiK\LaravelCrudGenerator;

use PiekarskiK\LaravelCrudGenerator\Commands\CrudGeneratorCommand;
use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudGeneratorCommand::class,
            ]);
        }
    }
}