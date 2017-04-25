<?php

//ini_set('display_errors', 'Off');


trait LoaderTrait
{
    protected $directorys;

    function __construct()
    {
        $this->directorys = [
            __DIR__ . '/../vendor/',
        ];
    }
}

abstract class LoaderClass
{
    use LoaderTrait;
}

class Returner
{
    public static function getAbstractClass()
    {
        return (new class extends LoaderClass
        {
            public function getLoader()
            {
                return function ($className) {

                    foreach ($this->directorys as $directory) {
                        if (file_exists($directory . $className . '.php')) {
                            require_once($directory . $className . '.php');

                            return;
                        }
                    }
                };
            }
        });
    }
}

$class = Returner::getAbstractClass();
$obj = new $class();

spl_autoload_register($obj->getLoader());

$destroyer = function () use (&$obj) {
    unset($obj);
};

$destroyer();