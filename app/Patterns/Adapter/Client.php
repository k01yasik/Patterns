<?php


namespace App\Patterns\Adapter;


class Client
{
    private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    function clientCode()
    {
        return $this->discount->getDiscountAmount();
    }
}
