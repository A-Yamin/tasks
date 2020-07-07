<?php

/**
 * Class Router
 * Component to work with routes
 */
class Router
{

    /**
     * Array of routes
     * @var array 
     */
    private $routes;

    public function __construct()
    {
        // path to routes
        $routesPath = ROOT . '/config/routes.php';

        // get routes from file
        $this->routes = include($routesPath);
    }

    /**
     * return query string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Method for processing query
     */
    public function run()
    {
        // get URI
        $uri = $this->getURI();

        // is exists in routes array (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

            // compare $uriPattern vs $uri
            if (preg_match("~^$uriPattern$~", $uri)) {

                // get inner path
                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

                // get Controller and Action

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // include Controller class
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // run Action
                $controllerObject = new $controllerName;

                /*
                 * run Action of Controller with Parameters
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // if OK break
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
