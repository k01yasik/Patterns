<?php

namespace App\Decorator;

use App\Decorator\Discount;

class IndividualDiscount implements Discount
{
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function add(int $amount)
    {
        $this->amount += $amount;
    }

    public function getDiscount(): int
    {
        return $this->amount;
    }
}