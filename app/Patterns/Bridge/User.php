<?php


namespace App\Patterns\Bridge;


class User
{
    protected $discountInterface;

    public function __construct(DiscountInterface $discountInterface)
    {
        $this->discountInterface = $discountInterface;
    }

    public function getDiscountAmount(): int
    {
        return $this->discountInterface->get();
    }
}
