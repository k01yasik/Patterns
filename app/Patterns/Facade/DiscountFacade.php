<?php

namespace App\Patterns\Facade;

class DiscountFacade
{
    protected $discount;

    public function __construct(
        Discount $discount = null
    ) {
        $this->discount = $discount ?: new Discount;
    }

    public function getDiscount(): int
    {
        return $this->discount->getDiscount();
    }
}