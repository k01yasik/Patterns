<?php

namespace Tests\Feature;

use App\Patterns\Composite\Client;
use App\Patterns\Composite\ReferalDiscountElement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompositeTest extends TestCase
{
    public function testCalculateDiscountWhenOneElement()
    {
        $element = new ReferalDiscountElement;
        $element->setDiscount(10);

        $client = new Client($element);

        $this->assertEquals(10, $client->getDiscont());
    }
}
