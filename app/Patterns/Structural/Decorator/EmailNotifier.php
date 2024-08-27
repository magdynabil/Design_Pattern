<?php

namespace App\Patterns\Structural\Decorator;

use App\Patterns\Structural\Decorator\Notifier;

class EmailNotifier implements Notifier
{
    private string $email;
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function notify()
    {
        echo "Sending email to: {$this->email}<br>";
        echo "Your latest operation was executed successfully<br><br><br>";
    }
}
