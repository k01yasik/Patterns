<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Mediator\Component1;
use App\Patterns\Mediator\Component2;
use App\Patterns\Mediator\ConcreteMediator;

class MediatorTest extends TestCase
{
    public function testMediatorPattern()
    {
        $c1 = new Component1;
        $c2 = new Component2;

        $mediator = new ConcreteMediator($c1, $c2);

        $this->assertEquals('', $c1->doA());

        $this->assertEquals('', $c2->doD());
    }
}
