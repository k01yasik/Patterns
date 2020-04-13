<?php


namespace App\Patterns\FactoryMethod;


abstract class DiscountFactory
{
    /**
     *
     * @return Operation
     */
    abstract public function createDiscountType(): Operation;

    /**
     *
     * @return int
     */
    public function getDiscount(): int
    {
        $discount = $this->createDiscountType();

        return $discount->giveDiscount();
    }
}
