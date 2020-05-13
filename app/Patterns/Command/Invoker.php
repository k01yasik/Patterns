<?php

namespace App\Patterns\Command;

class Invoker
{
    private $onStart;

    public function setOnStart(Command $command): void
    {
        $this->onStart = $command;
    }

    public function calculateDiscount(): int
    {
        if ($this->onStart instanceof Command) {
            return $this->onStart->execute();
        }
    }
}