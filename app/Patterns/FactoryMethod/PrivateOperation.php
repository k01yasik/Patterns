<?php


namespace App\Patterns\FactoryMethod;


class PrivateOperation implements Operation
{

    public function giveDiscount(): int
    {
        return 40;
    }
}
