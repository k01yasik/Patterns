<?php

namespace App\Patterns\Proxy;

class IndividualDiscount implements Discount
{
    public function getDiscount(): int
    {
        return 40;
    }
}