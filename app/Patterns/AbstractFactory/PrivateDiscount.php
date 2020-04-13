<?php


namespace App\Patterns\AbstractFactory;


class PrivateDiscount implements Discount
{

    public function getDiscount(): int
    {
        return 40;
    }
}
