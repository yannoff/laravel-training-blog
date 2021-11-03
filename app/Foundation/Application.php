<?php

namespace App\Foundation;

class Application extends \Illuminate\Foundation\Application
{
    /**
     * Avoid relying on composer.json to find out application namespace
     *
     * @see Illuminate\Foundation\Application::getNamespace()
     */
    protected $namespace = 'App\\';
}
