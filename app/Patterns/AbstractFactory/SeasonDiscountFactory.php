<?php


namespace App\Patterns\AbstractFactory;


class SeasonDiscountFactory implements DiscountFactory
{
    public function createPrivateDiscount(): PrivateDiscount
    {
        return new PrivateDiscount;
    }

    public function createIndividualDiscount(): IndividualDiscount
    {
        return new IndividualDiscount;
    }
}
