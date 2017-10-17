<?php

use Controllers\IndexController;

spl_autoload_register();

class Router
{
    protected $action_pattern = "/(?P<entity>\w+)\/(?P<id>\d+)\/(?P<action>\w+)/";
    protected $create_pattern = "/(?P<entity>\w+)\/(?P<action>\w+)/";
    protected $matches = [];

    public function execute()
    {
        $url = $_SERVER['PATH_INFO'] ?? null;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($url === NULL || $url === '/') {
            (new IndexController())->index();
        } else if (preg_match($this->action_pattern, $url, $this->matches)) {

            $entity = $this->matches['entity'];
            $action = $this->matches['action'];
            $id = $this->matches['id'];
            if ($entity === 'products') {
                $controller = new \Controllers\ProductController();
                $controller->execute($method, $action, $id);
            } else if ($entity === 'reviews') {
                $controller = new \Controllers\ReviewController();
                $controller->execute($method, $action, $id);
            } else if ($entity === 'users') {
                $controller = new \Controllers\UserController();
                $controller->execute($method, $action, $id);
            }
        } else if (preg_match($this->create_pattern, $url, $this->matches)) {
            $entity = $this->matches['entity'];
            $action = $this->matches['action'];
            if ($entity === 'products') {
                $controller = new \Controllers\ProductController();
                $controller->execute($method, $action);

            }else if ($entity === 'reviews') {
                $controller = new \Controllers\ReviewController();
                $controller->execute($method, $action);

            }else if ($entity === 'users') {
                $controller = new \Controllers\UserController();
                $controller->execute($method, $action);

            } else {
                print_r('Страница не найдена!');
                die();
            }

        }
    }
}





