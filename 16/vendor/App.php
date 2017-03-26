<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 26.03.2017
 * Time: 17:48
 */
class App
{
    private $routes;

    public function __construct()
    {
        $this->routes = parse_ini_file(ROOT . '/app/routing.ini')['routes'];
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function handle()
    {
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $segments = explode(':', $path);

                $controllerName = array_shift($segments) . 'Controller';

                $actionName = array_shift($segments) . 'Action';

//                $parameters = $segments;

                $controllerObject = new $controllerName;

                $result = call_user_func_array([$controllerObject, $actionName], []);

                if ($result != null) {
                    break;
                }
            }
        }

        // Hack for xampp and openserver where url is localhost/someUri/index.php
        if (!isset($result)) {
            (new AccountController())->indexAction();
        }
    }

    public function getRootDir()
    {
        return __DIR__ . '/../';
    }
}
