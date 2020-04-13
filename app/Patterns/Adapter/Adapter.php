<?php


namespace App\Patterns\Adapter;


class Adapter extends Discount
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function getDiscountAmount(): int
    {
        return $this->adaptee->get();
    }
}
