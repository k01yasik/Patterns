<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Command\Invoker;
use App\Patterns\Command\DiscountCommand;
use App\Patterns\Command\IndividualUser;

class CommandTest extends TestCase
{
    public function testCommandPattern()
    {
        $invoker = new Invoker;
        $invoker->setOnStart(new DiscountCommand(new IndividualUser(20)));

        $this->assertEquals(20, $invoker->calculateDiscount());
    }
}
