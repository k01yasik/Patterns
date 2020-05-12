<?php

namespace App\Patterns\ChainOfResponsibility;

class PrivateDiscountHandler extends AbstractHandler
{
    public function handle(string $request): ?int
    {
        if ($request === 'private') {
            return 40;
        } else {
            return parent::handle($request);
        }
    }
}