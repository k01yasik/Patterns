<?php

namespace App\Patterns\Mediator;

interface Mediator
{
    public function notify(object $sender, string $event): void;
}