<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Decorator\IndividualDiscount;
use App\Decorator\IndividualContainer;
use App\Decorator\Client;

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
