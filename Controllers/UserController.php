<?php


namespace Controllers;
use Models\User;

class UserController
{
    public function execute($method, $action, $id = null)
    {

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
        }




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