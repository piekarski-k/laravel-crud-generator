<?php

namespace PiekarskiK\LaravelCrudGenerator\Helpers;

class Helper
{
    protected function getStub($name): bool|string
    {
        return file_get_contents(__DIR__ . "/stubs/{$name}.stub");
    }
    
    protected function createTemplate(array $find, array $replace, string $stubName): string
    {
        return str_replace($find, $replace, $this->getStub($stubName));
    }
}