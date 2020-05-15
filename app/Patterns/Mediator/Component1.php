<?php

namespace App\Patterns\Mediator;

class Component1 extends BaseComponent
{
    private $result;

    public function doA(): void
    {
        $this->mediator->notify($this, "A");
    }

    public function doB(): void
    {
        $this->result = 40;
    }

    public function getResult(): int
    {
        return $this->result;
    }
}