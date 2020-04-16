<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Proxy\IndividualDiscount;
use App\Patterns\Proxy\Proxy;

class ProxyTest extends TestCase
{
    public function testProxyPattern()
    {
        $individualDiscount = new IndividualDiscount();
        $proxy = new Proxy($individualDiscount);

        $this->assertEquals(40, $proxy->getDiscount());
    }
}
