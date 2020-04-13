<?php


namespace App\Patterns\Builder;


interface DiscountBuilder
{
    public function setType(string $type): void;

    public function setDiscount(int $amount): void;
}
