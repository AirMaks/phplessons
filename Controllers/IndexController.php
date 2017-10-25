<?php

namespace Controllers;

use Models\Product;
use Models\Review;
use Models\User;


class IndexController
{
public function index()
{
    $products = (new Product())->getAll();

    include_once dirname(__FILE__) . '/../views/main.php';
}
public function admin(){
$products = (new Product())->getAll();
$reviews = (new Review())->getAll();
$users = (new User())->getAll();

    include_once dirname(__FILE__) . '/../views/list.php';
}

}