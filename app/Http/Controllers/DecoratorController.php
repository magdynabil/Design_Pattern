<?php

namespace App\Http\Controllers;

use App\Patterns\Structural\Decorator\Decorators\SMSNotifierDecorator;
use App\Patterns\Structural\Decorator\Decorators\WhatsAppNotifierDecorator;
use App\Patterns\Structural\Decorator\EmailNotifier;
use App\Patterns\Structural\Decorator\Notifier;

class DecoratorController extends Controller
{
    protected Notifier $notifier;

    public function sendNotification()
    {
        $smsNotificationEnabled = true;
        $whatsAppNotificationEnabled = true;
        $notifier = new EmailNotifier('mohammed@abc.com');

        if ($smsNotificationEnabled) {
            $notifier = new SMSNotifierDecorator($notifier, '01011111111');
        }
        if ($whatsAppNotificationEnabled) {
            $notifier = new WhatsAppNotifierDecorator($notifier, '012364874847');
        }
        $notifier->notify();
    }
}
