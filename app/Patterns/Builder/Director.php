<?php


namespace App\Patterns\Builder;


class Director
{
    private $discountBuilder;

    public function set(DiscountBuilder $discountBuilder): void
    {
        $this->discountBuilder = $discountBuilder;
    }

    public function create(): void
    {
        $this->discountBuilder->setType('individual');
    }

    public function createFull(): void
    {
        $this->discountBuilder->setType('individual');
        $this->discountBuilder->setDiscount(20);
    }
}
