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

    public function getComment(int $i): Comment
    {
        return $this->comments[$i];
    }

    public function changeComment(Comment $comment, int $i)
    {
        $this->comments[$i] = $comment;
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

    public function getAllLevelChildComments($comment)
    {
        $result = [];

        $commentChilds = $this->getChildsByComment($comment);

        if (count($commentChilds) > 0) {
            foreach ($commentChilds as $childComment) {
                array_push($result, $childComment);

                $childs = $this->getAllLevelChildComments($childComment);

                foreach ($childs as $child) {
                    array_push($result, $child);
                }
            }
        }

        return $result;
    }
}
