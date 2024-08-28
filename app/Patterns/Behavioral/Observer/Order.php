<?php

namespace App\Patterns\Behavioral\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Order implements SplSubject
{
    private $observers;
    private $orderNumber;

    public function __construct($orderNumber)
    {
        $this->observers = new SplObjectStorage();
        $this->orderNumber = $orderNumber;
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function updateOrder()
    {

        // Notify all observers about the update
        $this->notify();
    }

    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }
}
