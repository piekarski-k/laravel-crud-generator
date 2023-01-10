<?php

namespace PiekarskiK\LaravelCrudGenerator;

use PiekarskiK\LaravelCrudGenerator\Commands\CrudGeneratorCommand;
use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/crud.php', 'crud');
    }
    
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'crud');
        
        $this->publishes([
            __DIR__.'/../lang' => resource_path('lang/vendor/crud'),
        ], 'lang');
        
        $this->publishes([
            __DIR__.'/../config/crud.php' => config_path('crud.php'),
        ], 'config');
        
        if ($this->app->runningInConsole()) {
            
            $this->commands([
                CrudGeneratorCommand::class,
            ]);
        }
    }
}