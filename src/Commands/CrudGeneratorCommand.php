<?php

namespace PiekarskiK\LaravelCrudGenerator\Commands;

use Illuminate\Console\Command;
use PiekarskiK\LaravelCrudGenerator\Generator\Controller;
use PiekarskiK\LaravelCrudGenerator\Generator\Repository;
use PiekarskiK\LaravelCrudGenerator\Generator\Request;

class CrudGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    private string $module_name;
    private string $controller_variant;
    private array $controller_variants = [
        'basic',
        'api',
        'inertia'
    ];
    
    protected array $can_generate = [
        'controller' => 'yes',
        'model'      => 'yes',
        'repository' => 'yes',
        'route'      => 'yes',
    ];
    
    public function handle()
    {
        $this->module_name = $this->ask('Module name? (Use CamelCase)');
        $this->controller_variant = $this->choice("Controller variant?", $this->controller_variants);
        
        (new Controller($this->module_name, config('crud.controllers.path'),$this->controller_variant))->create();
        (new Request($this->module_name, config('crud.requests.path')))->create();
        (new Repository($this->module_name, config('crud.repositories.path')))->create();
        
        echo 'aaa';
        
        return 1;
    }
}
