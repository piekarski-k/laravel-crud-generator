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
        $template = $this->createTemplate(
            [
                '{{className}}',
                '{{classNameLower}}'
            ],
            [
                $this->name,
                strtolower($this->name)
            ],
            "{$this->name}-{$this->variant}"
        );
    
        file_put_contents($this->path, $template);
    }
}