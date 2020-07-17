<?php

namespace Tests\Feature;

use App\Patterns\State\ConcreteState;
use App\Patterns\State\Context;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StateTest extends TestCase
{
    public function testStatePattern()
    {
        $context = new Context(new ConcreteState());
        $this->assertEquals(20, $context->request());
    }
}
