<?php


namespace App\Patterns\Bridge;


class ApiDiscount implements DiscountInterface
{

    public function get(): int
    {
        return 60;
    }
}
