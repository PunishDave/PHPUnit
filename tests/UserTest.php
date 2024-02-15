<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnName()
    {
        $user = new User;

        $user->first_name = "Dave";
        $user->surname = "Berry";

        $this->assertEquals('Dave Berry', $user->getFullName());

    }

    public function testFullNameEmpty()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());

    }

    public function test_user_has_first_name()
    {
        $user = new User;
        $user->first_name = 'Dave';
        $this->assertEquals('Dave', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer->expects($this->once())
                    ->method('sendMessage')
                    ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = 'dave@example.com';
        
        $this->assertTrue($user->notify("Hello"));
    }

    public function testNotifynoEmail()
    {
        $user = new User;

        $mock_mailer = $this->getMockBuilder(Mailer::class)
                            ->onlyMethods([])
                            ->getMock();



        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify("Hello");
    }

}