<?php


namespace App\Patterns\Flyweight;


class DiscountFactory
{
    private $flyweights = [];

    public function __construct(array $initialFlyweights)
    {
        foreach ($initialFlyweights as $state) {
            $this->flyweights[$this->getKey($state)] = new Discount($state);
        }
    }

    private function getKey(array $state): string
    {
        ksort($state);

        return implode("_", $state);
    }

    public function getFlyweight(array $sharedState): Discount
    {
        $key = $this->getKey($sharedState);

        if (!isset($this->flyweights[$key])) {
            $this->flyweights[$key] = new Discount($sharedState);
        } 

        return $this->flyweights[$key];
    }

    public function countFlyweights(): int
    {
        return count($this->flyweights);
    }
}
