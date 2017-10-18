<?php


spl_autoload_register(function($className){

$className = ltrim($className, '\\');
$fileName = '';
$namespace = '';

if($lastNsPos = strrpos($className, '\\')) {
    $namespace = substr($className, 0, $lastNsPos);
    $className = substr($className, $lastNsPos + 1);
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
}
$fileName .= str_replace('_',  DIRECTORY_SEPARATOR, $className) . '.php';
require $fileName;

});
$router = new Router();

$router->get('/products\/(?P<id>\d+)\/view/', 'ProductController', 'view');
$router->get('/products\/(?P<id>\d+)\/edit/', 'ProductController', 'edit');
$router->post('/products\/(?P<id>\d+)\/edit/', 'ProductController', 'edit');
$router->post('/products\/(?P<id>\d+)\/delete/', 'ProductController', 'delete');
$router->post('/products\/create/', 'ProductController', 'create');


$router->get('/reviews\/(?P<id>\d+)\/view/', 'ReviewController', 'view');
$router->get('/reviews\/(?P<id>\d+)\/edit/', 'ReviewController', 'edit');
$router->post('/reviews\/(?P<id>\d+)\/edit/', 'ReviewController', 'edit');
$router->post('/reviews\/(?P<id>\d+)\/delete/', 'ReviewController', 'delete');
$router->post('/reviews\/create/', 'ReviewController', 'create');

$router->get('/users\/(?P<id>\d+)\/view/', 'UserController', 'view');
$router->get('/users\/(?P<id>\d+)\/edit/', 'UserController', 'edit');
$router->post('/users\/(?P<id>\d+)\/edit/', 'UserController', 'edit');
$router->post('/users\/(?P<id>\d+)\/delete/', 'UserController', 'delete');
$router->post('/users\/create/', 'UserController', 'create');

$router->get('/\//', 'IndexController');
$router->execute();

?>
