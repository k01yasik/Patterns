<?php

namespace Tests\Feature;

use App\Patterns\Observer\Discount;
use App\Patterns\Observer\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ObserverTest extends TestCase
{
    public function testObserverPattern()
    {
        $subject = new Subject();

        $discount = new Discount();

        $subject->attach($discount);

        $subject->someBusinessLogic();

        $this->assertEquals(true, $discount->isGoodDiscount());
    }
}
