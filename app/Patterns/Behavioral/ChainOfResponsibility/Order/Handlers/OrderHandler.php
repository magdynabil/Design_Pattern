<?php
namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers;

use App\Patterns\Behavioral\ChainOfResponsibility\Order\Order;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Services\OrderService\Application;

class OrderHandler extends BaseHandler
{
    public function handle(Order $order)
    {
        $orderService = new Application();
        $orderService->addOrder($order);
        echo "The order of {$order->getUser()->getName()}
            contains {$order->getProduct()->getName()}
            and will be shipped by
            {$order->getShipmentDate()->format('Y-m-d')}\n";
    }
}

