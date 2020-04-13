<?php


namespace App\Patterns\Builder;


class IndividualDiscountBuilder implements DiscountBuilder
{
    private $discount;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->discount = new IndividualDiscount;
    }

    public function setType(string $type): void
    {
        $this->discount->type = $type;
    }

    public function setDiscount(int $amount): void
    {
        $this->discount->discountAmount = $amount;
    }

    public function get(): IndividualDiscount
    {
        $result = $this->discount;
        $this->reset();

        return $result;
    }
}
