<?php

namespace App\Patterns\Strategy;

class PrivateDiscount implements Strategy
{
    public function getDiscount()
    {
        return 20;
    }
}