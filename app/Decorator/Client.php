<?php

namespace App\Decorator;

use App\Decorator\Discount;

class Client
{
    protected $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(): int
    {
        return $this->discount->getDiscount();
    }
}