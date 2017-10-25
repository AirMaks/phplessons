<?php


namespace Controllers;

use Models\User;

class UserController
{


    public
    function __construct()
    {
        // Вызывается при инициализации
        $this->user = new User();
    }

    public
    function view($params)
    {
        $id = $params['id'];
        $user = $this->user->getOne($id);
        if (!$user) {
            print_r('Пользователь не найден');
            die();
        }
        $editable = false;
        include_once dirname(__FILE__) . '/../views/users.php';
    }


    public
    function edit($params)
    {
        $id = $params['id'];

        $uploads_dir = dirname(__FILE__) . '/../img';
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
                'name' => $_POST['name'],
                'lastname' => $_POST['lastname'],
                'phone' => $_POST['phone'],
                'photo' => "$name",
            ];

        }


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user = $this->user->getOne($id);
            if (!$user) {
                print_r('Пользователь не найден');
                die();
            }
            // Делаем товар редактируемым
            $editable = true;
            // Отдаём views/users.php
            include_once dirname(__FILE__) . '/../views/users.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->update($id, $_POST);
            header('Location: /16/admin');
        }
    }

    public
    function delete($params)
    {
        $id = $params['id'];
        $this->user->delete($id);
        header('Location: /16/admin');
    }

    public
    function create($params)
    {
        $id = $params['id'];
         $uploads_dir = dirname(__FILE__) . '/../img';
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
                'name' => $_POST['name'],
                'lastname' => $_POST['lastname'],
                'phone' => $_POST['phone'],
                'photo' => "$name",
            ];

        }

        $this->user->create($_POST);
        header('Location: /16/admin');
    }


}




