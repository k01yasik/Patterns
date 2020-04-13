<?php


namespace App\Patterns\Composite;


class ReferalDiscountElement extends ReferalDiscount
{
    public function getDiscount(): int
    {
        return $this->discount;
    }
}
