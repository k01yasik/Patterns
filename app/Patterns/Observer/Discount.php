<?php

namespace App\Patterns\Observer;

class Discount implements \SplObserver
{
    private $good;

    public function update(\SplSubject $subject): void
    {
        $this->good = true;
    }

    public function isGood():bool
    {
        return $this->good;
    }
}
