<?php

namespace App\Patterns\Structural\Decorator\Decorators;
use App\Patterns\Structural\Decorator\Notifier;
use App\Patterns\Structural\Decorator\NotifierDecorator;

class WhatsAppNotifierDecorator extends NotifierDecorator
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
        $this->sendWhatsAppMessage();
    }

    private function sendWhatsAppMessage()
    {
        echo "Sending WhatsApp message to {$this->phoneNumber}<br>";
        echo "Your latest operation was executed successfully<br><br><br>";
    }
}

