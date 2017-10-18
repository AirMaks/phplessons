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


//        if ($url === NULL || $url === '/') {
//            (new IndexController())->index();
//        } else if (preg_match($this->action_pattern, $url, $this->matches)) {
//
//            $entity = $this->matches['entity'];
//            $action = $this->matches['action'];
//            $id = $this->matches['id'];
//            if ($entity === 'products') {
//                $controller = new \Controllers\ProductController();
//                $controller->execute($method, $action, $id);
//            } else if ($entity === 'reviews') {
//                $controller = new \Controllers\ReviewController();
//                $controller->execute($method, $action, $id);
//            } else if ($entity === 'users') {
//                $controller = new \Controllers\UserController();
//                $controller->execute($method, $action, $id);
//            }
//        } else if (preg_match($this->create_pattern, $url, $this->matches)) {
//            $entity = $this->matches['entity'];
//            $action = $this->matches['action'];
//            if ($entity === 'products') {
//                $controller = new \Controllers\ProductController();
//                $controller->execute($method, $action);
//
//            }else if ($entity === 'reviews') {
//                $controller = new \Controllers\ReviewController();
//                $controller->execute($method, $action);
//
//            }else if ($entity === 'users') {
//                $controller = new \Controllers\UserController();
//                $controller->execute($method, $action);
//
//            } else {
//                print_r('Страница не найдена!');
//                die();
//            }
//
//        }
//    }






