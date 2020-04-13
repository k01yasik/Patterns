<?php

namespace Tests\Feature;

use App\Patterns\Builder\ClientDiscount;
use App\Patterns\Builder\Director;
use App\Patterns\Builder\IndividualDiscountBuilder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuilderTest extends TestCase
{
    public function testCreateFullIndividualDiscount()
    {
        $discount = new ClientDiscount(new Director());

        $individualDiscount = $discount->createFull();

        $this->assertEquals('individual', $individualDiscount->type);
        $this->assertEquals(20, $individualDiscount->discountAmount);
    }

    public function testReturnRightDataWithoutDirector()
    {
        $builder = new IndividualDiscountBuilder();
        $builder->setType('individual');
        $builder->setDiscount(40);
        $discount = $builder->get();

        $this->assertEquals('individual', $discount->type);
        $this->assertEquals(40, $discount->discountAmount);
    }
}
