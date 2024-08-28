<?php

namespace App\Http\Controllers;

use App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers\LoyaltyHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers\OrderHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers\ProductAvailabilityHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers\ShipmentHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Order;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Product;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\User;
use App\Patterns\Structural\Decorator\Decorators\SMSNotifierDecorator;
use App\Patterns\Structural\Decorator\Decorators\WhatsAppNotifierDecorator;
use App\Patterns\Structural\Decorator\EmailNotifier;
use App\Patterns\Structural\Decorator\Notifier;

class ChainOfResponsibilityController extends Controller
{
    protected Notifier $notifier;

    public function handleOrder()
    {
        $user = new User('USR-101', 'John Doe');
        $product = new Product('PRD-1', 'Laptop');
        $shipmentDate = new \DateTime('2024-09-01');
        $order = new Order($user, $product, $shipmentDate);
        $loyaltyHandler = new LoyaltyHandler();
        $productAvailabilityHandler = new ProductAvailabilityHandler();
        $shipmentHandler = new ShipmentHandler();
        $orderHandler = new OrderHandler();
        $loyaltyHandler->setNextHandler($productAvailabilityHandler)
            ->setNextHandler($shipmentHandler)
            ->setNextHandler($orderHandler);
        try {
            $loyaltyHandler->handle($order);
            return "Order processed successfully.";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
