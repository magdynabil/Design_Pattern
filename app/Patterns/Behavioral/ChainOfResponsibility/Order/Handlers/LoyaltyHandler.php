<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers;

use App\Patterns\Behavioral\ChainOfResponsibility\Order\Order;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Services\LoyaltyService\Application;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions\NoLoyalUserException;

class LoyaltyHandler extends BaseHandler
{
    public function handle(Order $order)
    {
        $loyaltyService = new Application();
        if ($loyaltyService->isUserLoyal($order->getUser())) {
            if ($this->getNextHandler() !== null) {
                $this->getNextHandler()->handle($order);
            }
        } else {
            throw new NoLoyalUserException();
        }
    }
}
