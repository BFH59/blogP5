<?php

namespace App\src\manager;

class CommentManager extends DAO
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT comment.id, user.username, comment.content, comment.comment_date FROM comment INNER JOIN `user` ON user.id = comment.user_id WHERE post_id = ?';
        $result = $this->sql($sql,[$postId]);
        return $result;
    }
}