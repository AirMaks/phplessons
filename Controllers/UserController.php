<?php


namespace Controllers;
use Models\User;

class UserController
{
    public function execute($method, $action, $id = null)
    {
        $_user = new User();
        if($method === 'GET'){
            if ($action === 'view' || $action === 'edit'){
                $user = $_user->getOne($id);
                if(!$user){
                    print_r('Пользователь не найден');
                    die();
                }
                $editable = false;
                if($action === 'edit'){
                    $editable = true;
                }
                include_once dirname(__FILE__) . '/../views/users.php';
            }
        }else if($method === 'POST'){
            if($action === 'edit'){
                $_user->update($id, $_POST);
            }else if($action === 'delete'){
                $_user->delete($id);
            }else if($action === 'create'){
                $_user->create($_POST);
            }
            header('Location: /16/');
        }
    }


}