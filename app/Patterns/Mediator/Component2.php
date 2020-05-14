<?php

namespace App\Patterns\Mediator;

class Component2 extends BaseComponent
{
    public function doC(): void
    {
        $this->mediator->notify($this, "C");
    }

    public function doD(): void
    {
        $this->mediator->notify($this, "D");
    }
}