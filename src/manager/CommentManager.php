<?php

namespace App\src\manager;

use App\src\model\Comment;

class CommentManager extends DAO
{
    public function getCommentsFromPost($postId)
    {
        $sql = 'SELECT comment.id, user.username, comment.content, comment.comment_date FROM comment INNER JOIN `user` ON user.id = comment.user_id WHERE post_id = ?';
        $result = $this->sql($sql,[$postId]);
        $comments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id'])
            ->setUserId($row['user_id'])
            ->setuserName($row['username'])
            ->setContent($row['content'])
            ->setCommentDate($row['comment_date']);
        return $comment;

    }
}