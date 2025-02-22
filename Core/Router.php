<?php

/**
 * Class Router
 * A server-side PHP router for handling HTTP requests.
 */
class Router
{
    /**
     * @var array stores the available routes registered in index.php
     */
    private array $routes = [];

    /**
     * Registers a new route.
     *
     * @param string   $method  The HTTP method (GET, POST, etc.).
     * @param string   $path    The route path
     * @param callable $handler the function to handle the request (controller method)
     */
    public function add(string $method, string $path, callable $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    /**
     * Executes the handler (controller method) for the matched route based on the request method and path.
     *
     * @param string $method the HTTP method of the request
     * @param string $path   the request path
     *
     * @return mixed the result of the route handler or an error response (if route is not found) in JSON format
     */
    public function run(string $method, string $path)
    {
        $format = $_GET['format'] ?? 'json'; // Takes the format provided in the query string, default is JSON

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return call_user_func($route['handler'], $format);
            }
        }

        return Response::send(['error' => 'true', 'message' => 'Route not found'], 404, $format);
    }
}
