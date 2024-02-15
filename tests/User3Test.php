<?php

use PHPUnit\Framework\TestCase;

class User3Test extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    //commented out, as the mock clashes and breaks user2test
    //
    // public function testNotify()
    // {
    //     $user = new User2('dave@example.com');

    //     $mock = Mockery::mock('alias:Mailer22');

    //     $mock->shouldReceive('send')
    //          ->once()
    //          ->with($user->email, 'Hello!')
    //          ->andReturn(true);

    //     $this->assertTrue($user->notify('Hello!'));
    // }
}