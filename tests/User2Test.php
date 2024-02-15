<?php

use PHPUnit\Framework\TestCase;

class User2Test extends TestCase
{
    public function testNotify()
    {
        $user = new User2('dave@example.com');

        $mailer = $this->createMock(Mailer2::class);

        $mailer->expects($this->once())
               ->method('send')
               ->willReturn(true);

        $user->setMailer($mailer);

        $user->setMailerCallable(function() {
            echo "mocker";

            return true;
        });

        $this->assertTrue($user->notify('Hello!'));
    }
}
