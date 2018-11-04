<?php

declare(strict_types=1);

namespace PHPSchool;

class Template
{
    private const EXTENSION = '.tpl';
    private const PATH = __DIR__ . '/templates/';

    private $template;

    public function __construct(string $name)
    {
        if (!file_exists($this->getTemplatePath($name))) {
            throw new \LogicException("Template '$name' doesn't exist");
        }

        $this->template = file_get_contents($this->getTemplatePath($name));
    }

    public function parse(array $assigns = []) : string
    {
        return str_replace(array_keys($assigns), array_values($assigns), $this->template);
    }

    private function getTemplatePath(string $name) : string
    {
        return self::PATH . $name . self::EXTENSION;
    }
}