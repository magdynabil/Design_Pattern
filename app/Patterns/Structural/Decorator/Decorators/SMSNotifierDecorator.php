<?php

namespace App\Patterns\Structural\Decorator\Decorators;

use App\Patterns\Structural\Decorator\Notifier;
use App\Patterns\Structural\Decorator\NotifierDecorator;

class SMSNotifierDecorator extends NotifierDecorator
{
    protected string $phoneNumber;

    public function __construct(Notifier $notifier, string $phoneNumber)
    {
        parent::__construct($notifier);
        $this->phoneNumber = $phoneNumber;
    }

    public function notify()
    {
        parent::notify();
        $this->sendSMS();
    }

    private function sendSMS()
    {
        echo "Sending SMS to {$this->phoneNumber}<br>";
        echo "Your latest operation was executed successfully<br><br><br>";
    }
}
