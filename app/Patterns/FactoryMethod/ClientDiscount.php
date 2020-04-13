<?php


namespace App\Patterns\FactoryMethod;


class ClientDiscount
{
    private $discount;

    public function __construct(DiscountFactory $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount()
    {
        return $this->discount->getDiscount();
    }
}
