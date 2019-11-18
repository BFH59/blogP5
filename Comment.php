<?php


class Comment extends Database
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT id, user_id, content, comment_date FROM comment WHERE post_id = ?';
        $result = $this->sql($sql,[$postId]);
        return $result;
    }
}