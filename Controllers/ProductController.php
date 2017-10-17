<?php


namespace Controllers;
use Models\Product;

class ProductController
{
    public function execute($method, $action, $id = null)
    {
        $_product = new Product();
        if($method === 'GET'){
            if ($action === 'view' || $action === 'edit'){
                $product = $_product->getOne($id);
                if(!$product){
                    print_r('Товар не найден');
                    die();
                }
                $editable = false;
                if($action === 'edit'){
                    $editable = true;
                }
                include_once dirname(__FILE__) . '/../views/products.php';
            }
        }else if($method === 'POST'){
            if($action === 'edit'){
                $_product->update($id, $_POST);
            }else if($action === 'delete'){
                $_product->delete($id);
            }else if($action === 'create'){
                $_product->create($_POST);
            }
            header('Location: /16/');
        }
    }
}