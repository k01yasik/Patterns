<?php

namespace App\Patterns\ChainOfResponsibility;

class IndividualDiscountHandler extends AbstractHandler
{
    public function handle(string $request): ?int
    {
        if ($request === 'individual') {
            return 20;
        } else {
            return parent::handle($request);
        }
    }
}