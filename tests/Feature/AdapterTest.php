<?php

namespace Tests\Feature;

use App\Patterns\Adapter\Adaptee;
use App\Patterns\Adapter\Adapter;
use App\Patterns\Adapter\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdapterTest extends TestCase
{
    public function testReturnRightDataWithAdapter()
    {
        $adaptee = new Adaptee;
        $adapter = new Adapter($adaptee);
        $client = new Client($adapter);
        $result = $client->clientCode();

        $this->assertEquals(40, $result);
    }
}
