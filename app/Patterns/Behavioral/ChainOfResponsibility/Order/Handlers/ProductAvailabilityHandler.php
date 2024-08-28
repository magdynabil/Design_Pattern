<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers;

use App\Patterns\Behavioral\ChainOfResponsibility\Order\Order;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Services\ProductAvailabilityService\Application;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions\NoProductAvailableException;

class ProductAvailabilityHandler extends BaseHandler
{
    public function handle(Order $order)
    {
        $productAvailabilityService = new Application();
        if ($productAvailabilityService->isProductAvailable($order->getProduct())) {
            if ($this->getNextHandler() !== null) {
                $this->getNextHandler()->handle($order);
            }
        } else {
            throw new NoProductAvailableException();
        }
    }
}
