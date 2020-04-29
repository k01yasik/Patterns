<?php

namespace App\Comment;

class Comment
{
    private $number;
    private $level;
    private $childs = [];

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

    public function addChilds(Array $childs): void
    {
        foreach ($childs as $child) {
            array_push($this->childs, $child);
        }
    }

    public function hasChild(): bool
    {
        return count($this->childs) > 0 ? true : false;
    }

    public function getChilds(): Array
    {
        return $this->childs;
    }
}