<?php
namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Handlers;

use App\Patterns\Behavioral\ChainOfResponsibility\Order\Order;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Services\ShipmentAvailabilityService\Application;
use App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions\NoShipmentAvailableException;

class ShipmentHandler extends BaseHandler
{
    public function handle(Order $order)
    {
        $shipmentService = new Application();
        if ($shipmentService->hasShipmentTruckAvailable($order)) {
            if ($this->getNextHandler() !== null) {
                $this->getNextHandler()->handle($order);
            }
        } else {
            throw new NoShipmentAvailableException();
        }
    }
}

