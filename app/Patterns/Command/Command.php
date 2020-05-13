<?php

namespace App\Patterns\Command;

interface Command
{
    public function execute(): int;
}