<?php

namespace Tests\Feature;

use App\Patterns\Bridge\ApiDiscount;
use App\Patterns\Bridge\ClientBridge;
use App\Patterns\Bridge\DbDiscount;
use App\Patterns\Bridge\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BridgeTest extends TestCase
{
    public function testReturnRightDBDiscount()
    {
        $dbDiscount = new DbDiscount;
        $user = new User($dbDiscount);

        $clientBridge = new ClientBridge($user);

        $result = $clientBridge->getDiscountAmount();

        $this->assertEquals(40, $result);
    }

    public function testReturnRightApiDiscount()
    {
        $apiDiscount = new ApiDiscount;
        $user = new User($apiDiscount);

        $clientBridge = new ClientBridge($user);

        $result = $clientBridge->getDiscountAmount();

        $this->assertEquals(60, $result);
    }
}
