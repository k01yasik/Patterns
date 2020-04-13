<?php

namespace App\Patterns\Decorator;

class Client implements Discount
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
