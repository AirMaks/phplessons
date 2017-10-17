<?php


namespace Controllers;
use Models\Review;

class ReviewController
{
    public function execute($method, $action, $id = null)
    {
        $_review = new Review();
        if($method === 'GET'){
            if ($action === 'view' || $action === 'edit'){
                $review = $_review->getOne($id);
                if(!$review){
                    print_r('Отзыв не найден');
                    die();
                }
                $editable = false;
                if($action === 'edit'){
                    $editable = true;
                }
                include_once dirname(__FILE__) . '/../views/reviews.php';
            }
        }else if($method === 'POST'){
            if($action === 'edit'){
                $_review->update($id, $_POST);
            }else if($action === 'delete'){
                $_review->delete($id);
            }else if($action === 'create'){
                $_review->create($_POST);
            }
            header('Location: /16/');
        }
    }
}