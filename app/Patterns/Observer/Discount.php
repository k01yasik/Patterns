<?php

namespace App\Patterns\Observer;

class Discount implements \SplObserver
{
    private $goodDiscount;

    public function update(\SplSubject $subject): bool
    {
        if ($subject->state > 5) return $goodDiscount = true;
    }

    public function isGoodDiscount()
    {
        return $this->goodDiscount;
    }
}