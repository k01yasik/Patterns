<?php

namespace App\Comment;

class Comment
{
    private $number;
    private $level;
    private $parent;

    public function __construct(int $number, int $level)
    {
        $this->number = $number;
        $this->level = $level;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
    
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(int $parent): void
    {
        $this->parent = $parent;
    }
}