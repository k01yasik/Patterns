<?php

namespace Tests\Feature;

use App\Patterns\Memento\Caretaker;
use App\Patterns\Memento\Discount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MementoTest extends TestCase
{
    public function testMementoPattern()
    {
        $discount = new Discount(10);
        $caretaker = new Caretaker($discount);

        $discount->addDiscount(10);

        $caretaker->backup();

        $discount->addDiscount(10);

        $this->assertEquals(30, $discount->getDiscount());

        $caretaker->undo();

        $this->assertEquals(20, $discount->getDiscount());
    }
}
