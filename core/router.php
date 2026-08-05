<?php

class Router
{
    private array $routes = [];

    public function get(string $route, callable $callback): void
    {
        $this->routes['GET'][$route] = $callback;
    }

    public function post(string $route, callable $callback): void
    {
        $this->routes['POST'][$route] = $callback;
    }

    public function put(string $route, callable $callback): void
    {
        $this->routes['PUT'][$route] = $callback;
    }

    public function delete(string $route, callable $callback): void
    {
        $this->routes['DELETE'][$route] = $callback;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {

            $this->routes[$method][$uri]();

            return;
        }

        http_response_code(404);

        echo json_encode([
            "status" => false,
            "message" => "Ruta no encontrada"
        ]);
    }
}

?>