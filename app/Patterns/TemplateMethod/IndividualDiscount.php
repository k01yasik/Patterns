<?php

namespace App\Patterns\TemplateMethod;

class IndividualDiscount extends Discount
{
    protected function addingCalculate(): void
    {
        $this->amount += 20;
    }
}