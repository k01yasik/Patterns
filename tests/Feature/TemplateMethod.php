<?php

namespace Tests\Feature;

use App\Patterns\TemplateMethod\Client;
use App\Patterns\TemplateMethod\IndividualDiscount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TemplateMethod extends TestCase
{
    public function testTemplateMethod()
    {
        $client = new Client(new IndividualDiscount());

        $client->calculateDiscount();

        $this->assertEquals(30, $client->getDiscount());
    }
}
