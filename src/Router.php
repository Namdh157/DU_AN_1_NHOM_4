<?php

namespace MVC_DA1;

class Router
{
    protected $routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri)
    {
        $tmp = explode('?', $uri);

        $uri = $tmp[0];
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            // echo '<pre>';
            // print_r($uri);
            // die;
            throw new \Exception("không tìm thấy đường dẫn nào: $uri");
        }
    }
}
