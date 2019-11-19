<?php

namespace App\src\controller;

use App\src\manager\CommentManager;
use App\src\manager\PostManager;

class FrontController
{

    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function home()
    {
        $posts = $this->postManager->getPosts();
        require '../templates/home.php';
    }

    public function single($postId)
    {
        $post = $this->postManager->getPost($_GET['postId']);
        $comments = $this->commentManager->getCommentsFromPost($_GET['postId']);
        require '../templates/single.php';
    }
}