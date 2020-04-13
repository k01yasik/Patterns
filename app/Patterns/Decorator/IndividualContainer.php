<?php

namespace App\Patterns\Decorator;

class IndividualContainer extends Container
{
    public function getDiscount(): int
    {
        return parent::getDiscount() - 5;
    }
}
