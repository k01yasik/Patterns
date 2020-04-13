<?php


namespace App\Patterns\AbstractFactory;


class ClientAbstractFactory
{
    private $discountFactory;

    public function __construct(DiscountFactory $discountFactory)
    {
        $this->discountFactory = $discountFactory;
    }

    public function getIndividualDiscount(): int
    {
        $discount = $this->discountFactory->createIndividualDiscount();
        return $discount->getDiscount();
    }

    public function getPrivateDiscount(): int
    {
        $discount = $this->discountFactory->createPrivateDiscount();
        return $discount->getDiscount();
    }
}
