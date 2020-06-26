<?php

namespace App\Patterns\Memento;

class DiscountMemento implements Memento
{
    private $state;

    public function __construct(int $state)
    {
        $this->state = $state;
    }

    public function getName(): string
    {
        return date('Y-m-d H:i:s')."/".strval($this->state);
    }

    public function getState(): int
    {
        return $this->state;
    }
}