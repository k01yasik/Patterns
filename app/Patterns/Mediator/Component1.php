<?php

namespace App\Patterns\Mediator;

class Component1 extends BaseComponent
{
    public function doA(): void
    {
        $this->mediator->notify($this, "A");
    }

    public function doB(): void
    {
        $this->mediator->notify($this, "B");
    }
}