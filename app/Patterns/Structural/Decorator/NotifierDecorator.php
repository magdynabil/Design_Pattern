<?php

namespace App\Patterns\Structural\Decorator;

use App\Patterns\Structural\Decorator\Notifier;
class NotifierDecorator implements Notifier
{
    protected Notifier $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    public function notify()
    {
        $this->notifier->notify();
    }
}

