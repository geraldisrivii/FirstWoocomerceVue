<?php 

namespace App\Classes;

class Router{

    // private static array $routes = [];

    private static string $path = 'App\\Controllers\\';

    private static string $namespace = 'wp/v2';

    public static function get(string $routeName, string $routeCallback, $midlleWare = null){
        Router::addRoute($routeName, 'GET', $routeCallback, $midlleWare);
    }
    
    public static function post(string $routeName, string $routeCallback, $midlleWare = null){
        Router::addRoute($routeName, 'GET', $routeCallback, $midlleWare);
    }

    public static function put(string $routeName, string $routeCallback, $midlleWare = null){
        Router::addRoute($routeName, 'GET', $routeCallback, $midlleWare);
    }

    public static function patch(string $routeName, string $routeCallback, $midlleWare = null){
        Router::addRoute($routeName, 'GET', $routeCallback, $midlleWare);
    }
    
    public static function delete(string $routeName, string $routeCallback, $midlleWare = null){
        Router::addRoute($routeName, 'GET', $routeCallback, $midlleWare);
    }

    private static function addRoute(string $routeName, string $routeMethod, string $routeCallback, $midlleWare = null){

        $controller = substr($routeCallback, 0, strpos($routeCallback, '@'));
        $method = substr($currentRoute['callback'], strpos($currentRoute['callback'], '@') + 1);

        $controllerPath = Router::$path . $controller;

        $instance = new $controllerPath();

        $instance->$method;

        register_rest_route( $namespace, $routeName, [
            'methods' => $routeMethod,
            'callback' => $instance->$method,
            'args' => [],
            'permission_callback' => function ($request) {
                return $midlleWare == null ? true : $midlleWare;
            },
        ] );
    }

    // public static function run(string $routeName){
    //     $currentRoute = null;
    //     foreach (Router::$routes as $key => $route) {
    //         if($route['name'] == $routeName){
    //             $currentRoute = $route;
    //             break;
    //         }
    //     }
    //     if($currentRoute == null){
    //         print_r('anything routes with key isnt enabled');
    //         return; 
    //     }
    //     $controller = substr($currentRoute['callback'], 0, strpos($currentRoute['callback'], '@'));
    //     $method = substr($currentRoute['callback'], strpos($currentRoute['callback'], '@') + 1);

    //     $controllerPath = Router::$path . $controller;
    //     $instance = new $controllerPath();

    //     $instance->$method();
    // }
} 