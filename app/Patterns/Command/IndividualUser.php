<?php

namespace App\Patterns\Command;

class IndividualUser implements User
{
    private $diacount;

    public function __construct(int $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }
}