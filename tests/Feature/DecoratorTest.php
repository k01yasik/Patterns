<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Decorator\IndividualDiscount;
use App\Patterns\Decorator\IndividualContainer;
use App\Patterns\Decorator\Client;

class DecoratorTest extends TestCase
{
    public function testIndividualDiscount()
    {
        $individualDiscount = new IndividualDiscount(10);
        $individualDiscount->add(10);

        $client = new Client($individualDiscount);

        $this->assertEquals(20, $client->getDiscount());
    }

    public function testIndividualContainer()
    {
        $individualDiscount = new IndividualDiscount(10);
        $individualDiscount->add(10);

        $individualContainer = new IndividualContainer($individualDiscount);

        $client = new Client($individualContainer);

        $this->assertEquals(15, $client->getDiscount());
    }
}
