<?php


namespace App\Patterns\AbstractFactory;


class IndividualDiscount implements Discount
{

    public function getDiscount(): int
    {
        return 20;
    }
}
