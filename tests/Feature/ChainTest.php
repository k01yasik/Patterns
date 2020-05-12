<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\ChainOfResponsibility\IndividualDiscountHandler;
use App\Patterns\ChainOfResponsibility\PrivateDiscountHandler;
use App\Patterns\ChainOfResponsibility\Client;

class ChainTest extends TestCase
{
    public function testChain()
    {
        $individual = new IndividualDiscountHandler;
        $private = new PrivateDiscountHandler;

        $individual->setNext($private);

        $ind = new Client($individual, 'private');
        $pri = new Client($private, 'private');

        $this->assertEquals(40, $ind->handle());
        $this->assertEquals(40, $pri->handle());
    }
}
