<?php


namespace App\Patterns\FactoryMethod;


class PrivateDiscount extends DiscountFactory
{

    /**
     *
     * @return Operation
     */
    public function createDiscountType(): Operation
    {
        return new PrivateOperation;
    }
}
