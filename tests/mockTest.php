<?php

use PHPUnit\Framework\TestCase;

class mockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);
        $result = $mock->sendMessage('dave@example.com', 'hello');
        $this->assertTrue($result);
    }





}