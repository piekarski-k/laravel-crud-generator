<?php

namespace PiekarskiK\LaravelCrudGenerator\Generator;

use PiekarskiK\LaravelCrudGenerator\Helpers\Helper;

class Request extends Helper
{
    private string $name;
    private string $path;
    private array $methods = [
        'Store',
        'Update'
    ];
    
    public function __construct(string $name, $path)
    {
        $this->name = $name;
        $this->path = $path;
    }
    
    public function create()
    {
        foreach ($this->methods as $method) {
            $className = $method.$this->name.'Request';
            $path      = $this->path.DIRECTORY_SEPARATOR.$this->name;
            $basePath  = app_path().str_replace('app', '', $path);
            $this->checkAndCreateDir($basePath);
            $template = $this->createTemplate(
                [
                    '{{className}}',
                    '{{name}}',
                    '{{auth}}',
                    '{{namespace}}',
                ],
                [
                    $className,
                    $this->name,
                    'Auth::check()',
                    config('crud.requests.namespace')
                ],
                "request"
            );
            file_put_contents($path.DIRECTORY_SEPARATOR.$className.".php", $template);
        }
    }
}