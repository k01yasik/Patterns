<?php

namespace Tests\Feature;

use App\Patterns\FactoryMethod\ClientDiscount;
use App\Patterns\FactoryMethod\IndividualDiscount;
use App\Patterns\FactoryMethod\PrivateDiscount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testReturnRightIndividualDiscount()
    {
        $discount = new ClientDiscount(new IndividualDiscount());
        $result = $discount->getDiscount();

        $this->assertEquals(20, $result);
    }

    public function testReturnRightPrivateDiscount()
    {
        $discount = new ClientDiscount(new PrivateDiscount());
        $result = $discount->getDiscount();

        $this->assertEquals(40, $result);
    }
}
