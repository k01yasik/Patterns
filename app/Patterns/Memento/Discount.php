<?php

namespace App\Patterns\Memento;

class Discount
{
    private $discountAmount;

    public function __construct(int $discountAmount)
    {
        $this->discountAmount = $discountAmount;
    }

    public function addDiscount(int $amount)
    {
        $this->discountAmount += $amount;
    }

    public function getDiscount(): int
    {
        return $this->discountAmount;
    }

    public function save(): Memento
    {
        return new DiscountMemento($this->discountAmount);
    }

    public function restore(Memento $memento): void
    {
        $this->discountAmount = $memento->getState();
    }
}