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


        $uploads_dir = dirname(__FILE__) . '/../products_image';
        foreach ($_FILES as $key => $value) {
            // var_dump($key);
            // var_dump($value);
            if ($value['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES[$key]["tmp_name"];
                $name = basename($_FILES[$key]["name"]);
                //var_dump($name);
                echo move_uploaded_file($tmp_name, "$uploads_dir/$name");

            }
            $_POST = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => "$name"
            ];

        }

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
            header('Location: /16/admin');
        }
    }


    public function delete($params)
    {
        $id = $params['id'];
        $this->product->delete($id);
        header('Location: /16/admin');
    }

    public
    function create($params)
    {


        $uploads_dir = dirname(__FILE__) . '/../products_image';
        foreach ($_FILES as $key => $value) {
            // var_dump($key);
            // var_dump($value);
            if ($value['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES[$key]["tmp_name"];
                $name = basename($_FILES[$key]["name"]);
                //var_dump($name);
                echo move_uploaded_file($tmp_name, "$uploads_dir/$name");

            }
            $_POST = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image' => "$name"
            ];

        }

        $this->product->create($_POST);
        header('Location: /16/admin');
    }

}












