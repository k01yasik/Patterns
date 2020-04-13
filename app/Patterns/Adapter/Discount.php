<?php


namespace App\Patterns\Adapter;


class Discount
{
    private $discountAmount;
    private $clientType;

    public function __construct(string $clientType, int $discountAmount)
    {
        $this->clientType = $clientType;
        $this->discountAmount = $discountAmount;
    }

    public function setDiscountAmount(int $discountAmount)
    {
        $this->discountAmount = $discountAmount;
    }

    public function getDiscountAmount(): int
    {
        return $this->discountAmount;
    }
}
