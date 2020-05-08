<?php

namespace App\Comment;

use App\Comment\Comment;

class CommentContainer
{
    private $comments = [];
    private $max_level;

    public function setMaxLevel(int $level)
    {
        $this->max_level = $level;
    }

    public function getMaxLevel()
    {
        return $this->max_level;
    }

    public function addComment(Comment $comment)
    {
        array_push($this->comments, $comment);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getRootComments()
    {
        $result = [];

        foreach ($this->comments as $comment)
        {
            if ($comment->getLevel() == 0) array_push($result, $comment);
        }

        return $result;
    }

    public function getChildsByComment(Comment $parent)
    {
        $result = [];

        $parentLevel = $parent->getLevel();

        if ($parentLevel == $this->max_level) return [];

        $parentNumber = $parent->getNumber();
        $childLevel = $parentLevel + 1;

        foreach ($this->comments as $comment) {
            if ($comment->getParent() == $parentNumber && $comment->getLevel() == $childLevel) {
                array_push($result, $comment);
            }
        }

        return $result; 
    }
}