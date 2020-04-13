<?php


namespace App\Patterns\Prototype;


class DiscountPrototype
{
    public $clientType;
    public $discountAmount;

    public function __clone()
    {
        $this->clientType;
        $this->discountAmount;
    }
}
