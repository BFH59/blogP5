<?php


namespace App\src\controller;


use App\src\manager\PostManager;
use App\src\model\View;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addPost($post)
    {
        if(isset($post['submit'])){
            $postManager = new PostManager();
            $postManager->addPost($post);
            session_start();
            $_SESSION['addPost'] = 'L\'article a bien été ajouté';
            header('location: ../public/index.php');
        }
        $this->view->render('addPost', [
            'post' => $post
        ]);
    }
}