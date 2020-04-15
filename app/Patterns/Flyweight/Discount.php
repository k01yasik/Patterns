<?php


namespace App\Patterns\Flyweight;


class Discount
{
    private $sharedState;

    public function __construct($sharedState)
    {
        $this->sharedState = $sharedState;
    }

    public function getDiscount(): int
    {
        return 20;
    }
}
