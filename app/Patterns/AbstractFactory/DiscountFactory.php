<?php


namespace App\Patterns\AbstractFactory;


interface DiscountFactory
{
    public function createPrivateDiscount(): PrivateDiscount;

    public function createIndividualDiscount(): IndividualDiscount;
}
