<?php

namespace App\Comment;

use App\Comment\Comment;

class CommentContainer
{
    private $comments = [];

    public function addComment(Comment $comment)
    {
        array_push($this->comments, $comment);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getCommentsByLevel(int $level)
    {
        $result = [];

        foreach ($this->comments as $comment)
        {
            if ($comment->getLevel() == $level) array_push($result, $comment);
        }

        return $result;
    }
}