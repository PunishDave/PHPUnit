<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();

    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
        
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
        
    }

    public function testNewQueue()
    {

        $this->assertEquals(0, static::$queue->getCount());

    }

    public function testItemAdding()
    {

        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());

    }


    public function testRemoval()
    {
        static::$queue->push('green');
        $item = static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testRemovalOrder()
    {
        static::$queue->push('first');
        static::$queue->push('second');
        $this->assertEquals('first', static::$queue->pop());

    }

    public function testMaxItems()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrown()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->expectExceptionMessage("Queue is full");

        static::$queue->push("wafer thin mint");



    }

}