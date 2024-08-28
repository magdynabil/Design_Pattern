<?php

namespace App\Patterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

class SystemAdmin implements SplObserver
{
    private $state;

    public function update(SplSubject $subject)
    {
        /** @var Order $subject */
        $this->state = sprintf("SystemAdmin notified for order number %s", $subject->getOrderNumber());
    }

    public function getState()
    {
        return $this->state;
    }
}

