<?php

class User2
{

    public $surname;

    public $email;

    protected $mailer;

    protected $mailer_callable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer(Mailer2 $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(string $message) {

        return $this->mailer->send($this->email, $message);

    }

    public function setMailerCallable(callable $mailer_callable) {
        $this->mailer_callable = $mailer_callable;
    }

    public function notify2(string $message) {

        return call_user_func($this->mailer_callable, $this->email, $message);

    }




}