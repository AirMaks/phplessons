<?php



class Router
{

    protected $matches = [];

    protected $routes = [];

    public function get($expression, $controller, $method = 'index')
    {

        $controller = "Controllers\\$controller";
        $this->routes['GET'][] = [
            'expression' => $expression,
            'controller' => new $controller,
            'method' => $method,
        ];

    }


    public function post($expression, $controller, $method = 'index')
    {

        $controller = "Controllers\\$controller";
        $this->routes['POST'][] = [
            'expression' => $expression,
            'controller' => new $controller,
            'method' => $method,
        ];

    }


    public function execute()
    {
        $url = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $route) {
            if (preg_match($route['expression'], $url, $this->matches)) {

                $route['controller']->{$route['method']}($this->matches);
                break;

            }
        }
    }
}

