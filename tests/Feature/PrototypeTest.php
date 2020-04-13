<?php

namespace Tests\Feature;

use App\Patterns\Prototype\DiscountPrototype;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PrototypeTest extends TestCase
{
    public function testCorrectlyCloneObject()
    {
        $result = new DiscountPrototype;
        $result->clientType = 'individual';
        $result->discountAmount = 20;

        $result2 = clone $result;

        $this->assertEquals('individual', $result2->clientType);

        $this->assertEquals(20, $result2->discountAmount);
    }
}
