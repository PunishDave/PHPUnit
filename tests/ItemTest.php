<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionNotEmpty()
    {
        $item = new Item;
        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInt()
    {
        $item = new ItemChild;
        $this->assertIsInt($item->getID());
    }

    public function testTokenisaString()
    {
        $item = new Item;
        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedToken()
    {
        $item = new Item;
        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }


}