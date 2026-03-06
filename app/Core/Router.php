<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    private function add(string $method, string $path, callable|array $handler): void
    {
        $this->routes[$method][rtrim($path, '/') ?: '/'] = $handler;
    }

    public function dispatch(Request $request): Response
    {
        $handler = $this->routes[$request->method][$request->path] ?? null;

        if (!$handler) {
            return new Response('<h1>404 Not Found</h1>', 404);
        }

        if (is_callable($handler)) {
            return $handler($request);
        }

        [$class, $method] = $handler;
        $controller = new $class();

        return $controller->$method($request);
    }
}
