<?php

namespace App\Patterns\TemplateMethod;

class Client
{
    private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;        
    }

    public function calculateDiscount(): void
    {
        $this->discount->calculate();
    }

    public function getDiscount(): int
    {
        return $this->discount->getDiscountAmount();
    }
}