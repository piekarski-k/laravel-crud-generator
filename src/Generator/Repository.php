<?php

namespace PiekarskiK\LaravelCrudGenerator\Generator;

use PiekarskiK\LaravelCrudGenerator\Helpers\Helper;

class Repository extends Helper
{
    private string $name;
    private string $path;
    private string $variant;
    
    public function __construct(string $name, string $path)
    {
        $this->name = $name;
        $this->path = $path;
    }
    
    public function create()
    {
        $className = $this->name.'Repository';
        $basePath  = app_path().str_replace('app', '', $this->path);
        $this->checkAndCreateDir($basePath);
        
        $template = $this->createTemplate(
            [
                '{{className}}',
                '{{name}}',
                '{{nameLower}}',
                '{{model}}',
                '{{modelLower}}',
                '{{namespace}}',
            ],
            [
                $className,
                $this->name,
                strtolower($this->name),
                $this->name,
                strtolower($this->name),
                config('crud.repositories.namespace')
            ],
            "repository"
        );
        
        echo $this->path . "Repository.php";
        
        file_put_contents($this->path . DIRECTORY_SEPARATOR . $className . ".php", $template);
    }
}