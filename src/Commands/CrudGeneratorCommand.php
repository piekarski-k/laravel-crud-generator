<?php

namespace PiekarskiK\LaravelCrudGenerator\Commands;

use Illuminate\Console\Command;
use PiekarskiK\LaravelCrudGenerator\Generator\Controller;

class CrudGeneratorCommand extends Command
{
    protected string $signature = 'make:crud {name}';

    protected string $description = 'Generate CRUD';
    
    private string $module_name;
    
    protected array $can_generate = [
        'controller' => 'yes',
        'model' => 'yes',
        'repository' => 'yes',
        'route' => 'yes',
    ];

    public function handle()
    {
//        $this->module_name = $this->ask('Module name? (Use CamelCase)');
//        $this->can_generate['controller'] = $this->ask('Generate Controller? ', 'yes');
//        $this->can_generate['model'] = $this->ask('Generate Model?', 'yes');
//        $this->can_generate['repository'] = $this->ask('Generate Repository?', 'yes');
//        $this->can_generate['route'] = $this->ask('Generate Route?', 'yes');
        
//        (new Controller($this->module_name, config('controllers.path')))->create();
        
        echo 'aaa';
        return 1;
    }
}
