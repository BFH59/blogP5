<?php


class Post extends Database
{
    public function getPosts()
    {
        $sql = 'SELECT id, user_id, title, chapo, content, post_date FROM post ORDER BY id DESC';
        $result = $this->sql($sql);
        return $result;
    }

    public function getPost($postId)
    {
        $sql = 'SELECT id, user_id, title, chapo, content,post_date FROM post WHERE id = ?';
        $result = $this->sql($sql, [$postId]);
        return $result;
    }
}