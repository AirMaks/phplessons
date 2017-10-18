<?php

namespace Controllers;
use Models\Product;

class ProductController
{
    public function __construct()
    {
        $this->product = new Product();
    }

    public function view($params)
    {
        $id = $params['id'];
        $product = $this->product->getOne($id);
        if (!$product) {
            print_r('Товар не найден');
            die();
        }
        $editable = false;
        include_once dirname(__FILE__) . '/../views/products.php';
    }


    public function edit($params)
    {
        $id = $params['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $product = $this->product->getOne($id);
            if (!$product) {
                print_r('Товар не найден');
                die();
            }
            $editable = true;
            include_once dirname(__FILE__) . '/../views/products.php';

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->update($id, $_POST);
            header('Location: /16/');
        }
    }


    public function delete($params)
    {
        $id = $params['id'];
        $this->product->delete($id);
        header('Location: /16/');
    }
        public
        function create()
        {
            $this->product->create($_POST);
            header('Location: /16/');
        }

    }













//    public function execute($method, $action, $id = null)
//    {
//        $_product = new Product();
//        if($method === 'GET'){
//            if ($action === 'view' || $action === 'edit'){
//                $product = $_product->getOne($id);
//                if(!$product){
//                    print_r('Товар не найден');
//                    die();
//                }
//                $editable = false;
//                if($action === 'edit'){
//                    $editable = true;
//                }
//                include_once dirname(__FILE__) . '/../views/products.php';
//            }
//        }else if($method === 'POST'){
//            if($action === 'edit'){
//                $_product->update($id, $_POST);
//            }else if($action === 'delete'){
//                $_product->delete($id);
//            }else if($action === 'create'){
//                $_product->create($_POST);
//            }
//            header('Location: /16/');
//        }
//    }
