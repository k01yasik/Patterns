<?php

namespace App\Patterns\TemplateMethod;

abstract class Discount
{
    protected $amount;

    final public function calculate(): void
    {
        $this->baseCalculate();
        $this->addingCalculate();
        $this->calculateHook();
    }

    protected function baseCalculate(): void
    {
        $this->amount = 10;
    }

    protected function getDiscountAmount(): int
    {
        return $this->amount;
    }

    abstract protected function addingCalculate(): void;

    protected function calculateHook(): void {}
}