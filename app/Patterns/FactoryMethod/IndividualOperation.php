<?php


namespace App\Patterns\FactoryMethod;


class IndividualOperation implements Operation
{

    public function giveDiscount(): int
    {
        return 20;
    }
}
