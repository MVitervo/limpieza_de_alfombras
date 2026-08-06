<?php

class Router
{
    private array $routes = [];

    public function get(string $route, array $handler): void
    {
        $this->routes['GET'][$route] = $handler;
    }

    public function post(string $route, array $handler): void
    {
        $this->routes['POST'][$route] = $handler;
    }

    public function put(string $route, array $handler): void
    {
        $this->routes['PUT'][$route] = $handler;
    }

    public function delete(string $route, array $handler): void
    {
        $this->routes['DELETE'][$route] = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // var_dump($method);
        // var_dump($uri);
        // return;

        if (isset($this->routes[$method][$uri])) {

            $handler = $this->routes[$method][$uri];

            $controllerClass = $handler[0];

            $methodName = $handler[1];

            return;
        }

        http_response_code(404);

        echo json_encode([
            "status" => false,
            "message" => "Ruta no encontrada"
        ]);
    }
}
