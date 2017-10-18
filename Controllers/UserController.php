<?php


namespace Controllers;
use Models\User;

class UserController
{


    public function __construct()
    {
        // Вызывается при инициализации
        $this->user = new User();
    }
    public function view($params)
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
    public function edit($params)
    {
        $id = $params['id'];
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
            header('Location: /16/');
        }
    }
    public function delete($params)
    {
        $id = $params['id'];
        $this->user->delete($id);
        header('Location: /16/');
    }
    public function create()
    {

        $this->user->create($_POST);
        header('Location: /16/');
    }


}