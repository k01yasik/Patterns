<?php


namespace App\Patterns\Bridge;


class DbDiscount implements DiscountInterface
{

    public function get(): int
    {
        return 40;
    }
}
