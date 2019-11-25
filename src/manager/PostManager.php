<?php

namespace App\src\manager;

use App\src\model\Post;

class PostManager extends DAO
{
    public function getPosts()
    {
        $sql = 'SELECT post.id, user.username, post.title, post.chapo, post.content, post.post_date FROM post INNER JOIN `user` ON user.id = post.user_id ORDER BY post.id desc ';
        $result = $this->sql($sql);
        $posts = [];
        foreach($result as $row){
            $postId = $row['id'];
            $posts[$postId] = $this->buildObject($row);
        }
        return $posts;
    }

    public function getPost($postId)
    {
        $sql = 'SELECT post.id, user.username, post.title, post.chapo, post.content,post.post_date FROM post INNER JOIN `user` ON user.id = post.user_id WHERE post.id = ?';
        $result = $this->sql($sql, [$postId]);
        $row = $result->fetch();
        if($row){
            return $this->buildObject($row);
        } else{
            echo 'Aucun article avec cet identifiant';
        }
    }

    public function addPost($post)
    {
        extract($post);
        $sql = 'INSERT INTO post (user_id, title, chapo, content,post_date)
                VALUES (?,?,?,?,NOW())';
        $this->sql($sql, [$user_id, $title, $chapo, $content]);
    }

    private function buildObject(array $row)
    {
        $post = new Post();
            $post->setId($row['id'])
                 ->setUserId($row['user_id'])
                 ->setuserName($row['username'])
                 ->setTitle($row['title'])
                 ->setChapo($row['chapo'])
                 ->setContent($row['content'])
                 ->setPostDate($row['post_date']);
        return $post;

    }
}