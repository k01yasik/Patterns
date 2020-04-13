<?php

namespace App\Decorator;

use App\Decorator\Container;

class IndividualContainer extends Container
{
    public function getDiscount(): int
    {
        return parent::getDiscount() - 5;
    }
}