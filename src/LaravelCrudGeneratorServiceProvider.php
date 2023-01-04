<?php
namespace PiekarskiK\LaravelCrudGenerator;

use PiekarskiK\LaravelCrudGenerator\Commands\CrudGeneratorCommand;
use Illuminate\Support\ServiceProvider;

class LaravelCrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.' /resources/views', 'laravel-crud-generator');
        
        if ($this->app->runningInConsole()) {
            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/laravel-crud-generator'),
            ], 'views');
            
            // Registering package commands.
            $this->commands([
                CrudGeneratorCommand::class
            ]);
        }
    }
    
    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
//        $this->app->singleton('laravel-crud-generator', function ($name, $auth) {
//            return new LaravelCrudGenerator($name, $auth);
//        });
    }
}