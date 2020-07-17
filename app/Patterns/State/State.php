<?php

namespace App\Patterns\State;

abstract class State
{
    protected $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function handle(): int;
}