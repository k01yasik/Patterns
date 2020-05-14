<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Patterns\Iterator\WordCollection;

class IteratorTest extends TestCase
{
    public function testIteratorPattern()
    {
        $collection = new WordCollection;

        $collection->addItem("First");
        $collection->addItem("Second");
        $collection->addItem("Third");

        $result = [];

        foreach($collection->getIterator() as $item) {
            $result[] = $item;
        }

        $this->assertEquals(3, count($result));
    }
}
