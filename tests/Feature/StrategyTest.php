<?php

namespace Tests\Feature;

use App\Patterns\Strategy\Context;
use App\Patterns\Strategy\PrivateDiscount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StrategyTest extends TestCase
{
    public function testStrategyPattern()
    {
        $context = new Context(new PrivateDiscount());

        $this->assertEquals(20, $context->getDiscount());
    }
}
