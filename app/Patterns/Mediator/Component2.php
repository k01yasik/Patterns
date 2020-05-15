<?php

namespace App\Patterns\Mediator;

class Component2 extends BaseComponent
{
    private $result;

    public function doC(): void
    {
        $this->result = 20;
    }

    public function doD(): void
    {
        $this->mediator->notify($this, "D");
    }

    public function getResult(): int
    {
        return $this->result;
    }
}