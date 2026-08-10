<?php

class Router
{
    private array $routes = [];

    private array $controllers = [];

    public function get(string $route, callable|array $handler): void
    {
        $this->routes['GET'][$route] = $handler;
    }

    public function post(string $route, callable|array $handler): void
    {
        $this->routes['POST'][$route] = $handler;
    }

    public function put(string $route, callable|array $handler): void
    {
        $this->routes['PUT'][$route] = $handler;
    }

    public function delete(string $route, callable|array $handler): void
    {
        $this->routes['DELETE'][$route] = $handler;
    }

    public function controller(string $class, object $controller): void
    {
        $this->controllers[$class] = $controller;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        if (!isset($this->routes[$method][$uri])) {

            http_response_code(404);

            echo json_encode([
                "status" => false,
                "message" => "Ruta no encontrada"
            ]);

            return;
        }

        $handler = $this->routes[$method][$uri];

        /*
         * Closure
         */
        if (is_callable($handler)) {

            $handler();

            return;
        }

        /*
         * Controller + method
         */
        if (is_array($handler)) {

            [$controllerClass, $methodName] = $handler;

            $controller = $this->controllers[$controllerClass];

            $controller->$methodName();

            return;
        }
    }
}
