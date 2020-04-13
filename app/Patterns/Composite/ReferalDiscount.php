<?php


namespace App\Patterns\Composite;


abstract class ReferalDiscount
{
    protected $parent;
    protected $discount;

    public function setParent(ReferalDiscount $parent): void
    {
        $this->parent = $parent;
    }

    public function getParent(): ReferalDiscount
    {
        return $this->parent;
    }

    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    public function addDiscount(ReferalDiscount $referalDiscount): void
    {
        $this->discount += $referalDiscount->getDiscount();
    }

    public function isComposite(): bool
    {
        return false;
    }

    public function add(ReferalDiscount $referalDiscount): void
    {}

    abstract public function getDiscount(): int;
}
