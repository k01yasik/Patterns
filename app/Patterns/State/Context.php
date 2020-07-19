<?php

namespace App\Patterns\State;

class Context
{
    private $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    public function transitionTo(State $state): void
    {
        $this->state = $state;
        $this->state->setContext($this);
    }

    public function request(): int
    {
        return $this->state->handle();
    }
}
