<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Flyweight\DiscountFactory;

class FlyweightTest extends TestCase
{
    
    public function testFlyweight()
    {
        $factory = new DiscountFactory([
            ["Nickolay", "Smirnov", "individual"],
            ["Pafnutiy", "Bzdykin", "private"]
        ]);

        $element = $factory->getFlyweight(["Akakiy", "Pupkin", "individual"]);

        $this->assertEquals(3, $factory->countFlyweights());
    }
}
