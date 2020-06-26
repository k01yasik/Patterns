<?php

namespace App\Patterns\Memento;

class Caretaker
{
    private $mementos = [];

    private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function backup(): void
    {
        $this->mementos[] = $this->discount->save();
    }

    public function undo(): void
    {
        if (!count($this->mementos)) return;

        $memento = array_pop($this->mementos);

        try {
            $this->discount->restore($memento);
        } catch (\Exception $e) {
            $this->undo();
        }
    }
}