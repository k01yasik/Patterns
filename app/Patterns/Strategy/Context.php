<?php

namespace App\Patterns\Strategy;

class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getDiscount()
    {
        return $this->strategy->getDiscount();
    }
}