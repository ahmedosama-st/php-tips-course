<?php

use IteratorAggregate;
use App\Utilties\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function test_it_is_iterable()
    {
        $collection = new Collection([1, 2]);

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }
}
