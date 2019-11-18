<?php


class Post extends Database
{
    public function getPosts()
    {
        $sql = 'SELECT post.id, user.username, post.title, post.chapo, post.content, post.post_date FROM post INNER JOIN `user` ON user.id = post.user_id ORDER BY post.id desc ';
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