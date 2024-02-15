<?php

use PHPUnit\Framework\TestCase;

class Mailer2Test extends TestCase
{
    public function testSendMessage()
    {
        $this->assertTrue(Mailer::send('dave@example.com', 'Hello!'));
    }

    public function testInvalidArgument()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send('', '');



    }
}
