<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function testadd()
    {
        $this->assertEquals(2, 1+1);

    }
   
    
}