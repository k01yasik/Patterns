<?php


namespace App\Patterns\Composite;


use SplObjectStorage;

class ReferalDiscountContainer extends ReferalDiscount
{
    protected $children;

    public function __construct()
    {
        $this->children = new SplObjectStorage;
    }

    public function add(ReferalDiscount $referalDiscount): void
    {
        $this->children->attach($referalDiscount);
        $referalDiscount->setParent($this);
    }

    public function isComposite(): bool
    {
        return true;
    }

    public function getDiscount(): int
    {
        $results = 0;

        foreach ($this->children as $child) {
            $results += $child->getDiscount();
        }

        return $results;
    }
}
