<?php

namespace Tests\Feature;

use App\Patterns\AbstractFactory\ClientAbstractFactory;
use App\Patterns\AbstractFactory\SeasonDiscountFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->client = new ClientAbstractFactory(new SeasonDiscountFactory());
    }

    public function testReturnRightSeasonIndividualDiscount()
    {
        $this->assertEquals(20, $this->client->getIndividualDiscount());
    }

    public function testReturnRightSeasonPrivateDiscount()
    {
        $this->assertEquals(40, $this->client->getPrivateDiscount());
    }
}
