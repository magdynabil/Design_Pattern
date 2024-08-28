<?php

namespace App\Http\Controllers;

use App\Patterns\Behavioral\Observer\Order;
use App\Patterns\Behavioral\Observer\Supplier;
use App\Patterns\Behavioral\Observer\SystemAdmin;
use App\Patterns\Behavioral\Observer\WarehouseAdmin;
use Illuminate\Http\Request;


class ObserverController extends Controller
{
    public function createOrder()
    {
        $order = new Order(1234);

        $warehouseAdmin = new WarehouseAdmin();
        $systemAdmin = new SystemAdmin();
        $supplier = new Supplier();

        $order->attach($warehouseAdmin);
        $order->attach($systemAdmin);
        $order->attach($supplier);

        $order->updateOrder();

        $data = [
            'warehouseAdmin' => $warehouseAdmin->getState(),
            'systemAdmin' => $systemAdmin->getState(),
            'supplier' => $supplier->getState(),
        ];

        return response()->json($data);
    }
}
