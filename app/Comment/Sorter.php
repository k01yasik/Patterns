<?php

namespace App\Comment;

class Sorter
{
    const COMMENT_LEVELS = 4;

    public function sortComments(Array $comments): Array
    {
        usort($comments, Array($this, "cmp"));

        return $comments;
    }

    public function cmp($a, $b)
    {
        return $a->getNumber() - $b->getNumber();
    }
}