<?php

namespace App\Comment;

class Sorter
{
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