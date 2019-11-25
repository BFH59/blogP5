<?php

namespace App\src\controller;

use App\src\manager\CommentManager;
use App\src\manager\PostManager;
use App\src\model\View;

class FrontController
{

    private $postManager;
    private $commentManager;
    private $view;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->view = new View();
    }

    public function home()
    {
        $posts = $this->postManager->getPosts();
        $this->view->render('home', [
            'posts' => $posts
        ]);
    }

    public function single($postId)
    {
        $post = $this->postManager->getPost($_GET['postId']);
        $comments = $this->commentManager->getCommentsFromPost($_GET['postId']);
        $this->view->render('single', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}