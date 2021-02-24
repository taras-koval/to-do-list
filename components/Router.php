<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    // Returns request string
    private function getURI()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getURI();

        // Check request uri in routes.php
        foreach($this->routes as $uriPattern => $path) {

            // Compare $uriPattern and $uri
            if (preg_match("~^$uriPattern$~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;


                // Include controller class file
                $controllerFile = ROOT . '/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                } else {
                    die("The file $controllerFile does not exists");
                }

                // Create controller object
                $controllerObject = new $controllerName;

                // Call action 
                // controllerObject->actionName(...parameters)
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result) {
                    break;
                }
            }

        }
    }
}

?>