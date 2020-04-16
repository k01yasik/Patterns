<?php

namespace App\Patterns\Proxy;

class Proxy implements Discount
{
    private $individualDiscount;

    public function __construct (IndividualDiscount $individualDiscount)
    {
        $this->individualDiscount = $individualDiscount;
    }

    public function getDiscount(): int
    {
        return $this->individualDiscount->getDiscount();
    }
}