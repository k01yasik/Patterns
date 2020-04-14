<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Facade\Discount;
use App\Patterns\Facade\DiscountFacade;

class FacadeTest extends TestCase
{
    public function testFacade()
    {
        $discount = new Discount;
        $facade = new DiscountFacade($discount);

        $this->assertEquals(20, $facade->getDiscount());
    }
}
