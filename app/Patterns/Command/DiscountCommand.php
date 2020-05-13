<?php

namespace App\Patterns\Command;

class DiscountCommand implements Command
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute(): int
    {
        return $this->user->getDiscount();
    }
}