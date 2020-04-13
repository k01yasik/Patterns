<?php


namespace App\Patterns\Bridge;


class ClientBridge
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getDiscountAmount()
    {
        return $this->user->getDiscountAmount();
    }
}
