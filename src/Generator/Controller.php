<?php

namespace PiekarskiK\LaravelCrudGenerator\Generator;

use PiekarskiK\LaravelCrudGenerator\Helpers\Helper;

class Controller extends Helper
{
    private string $name;
    private string $path;
    private string $variant;
    
    public function __construct(string $name, $path, $variant = 'basic')
    {
        $this->name = $name;
        $this->path = $path;
        $this->variant = $variant;
    }
    
    public function create()
    {
        $className = $this->name.'Controller';
        
        $template = $this->createTemplate(
            [
                '{{className}}',
                '{{name}}',
                '{{nameLower}}',
                '{{namespace}}'
            ],
            [
                $className,
                $this->name,
                strtolower($this->name),
                config('crud.controllers.namespace')
            ],
            "controller-{$this->variant}"
        );
    
        echo $this->path . "Controller.php";
        
        file_put_contents($this->path . DIRECTORY_SEPARATOR . $className . ".php", $template);
    }
}