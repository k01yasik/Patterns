<?php


namespace App\Patterns\FactoryMethod;


class IndividualDiscount extends DiscountFactory
{

    /**
     *
     * @return Operation
     */
    public function createDiscountType(): Operation
    {
        return new IndividualOperation;
    }
}
