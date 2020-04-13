<?php


namespace App\Patterns\Composite;


class Client
{
    protected $referalDiscount;

    public function __construct(ReferalDiscount $referalDiscount)
    {
        $this->referalDiscount = $referalDiscount;
    }

    public function getDiscont(): int
    {
        return $this->referalDiscount->getDiscount();
    }
}
