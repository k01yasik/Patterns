<?php

namespace App\Patterns\Mediator;

class BaseComponent
{
    protected $mediator;

    public function __counstruct(Mediator $mediator = null)
    {
        $this->mediator = $mediator;
    }

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
}