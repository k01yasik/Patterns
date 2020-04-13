<?php


namespace App\Patterns\Builder;


class ClientDiscount
{
    private $director;

    public function __construct(Director $director)
    {
        $this->director = $director;
    }

    public function createFull()
    {
        $discount = new IndividualDiscountBuilder;
        $this->director->set($discount);
        $this->director->createFull();

        return $discount->get();
    }
}
