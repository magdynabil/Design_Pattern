<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Patterns\Behavioral\Specification\AndSpecification;
use App\Patterns\Behavioral\Specification\OrSpecification;
use App\Patterns\Behavioral\Specification\Specifications\CompletedOrderSpecification;
use App\Patterns\Behavioral\Specification\Specifications\MinimumAmountSpecification;
use App\Patterns\Behavioral\Specification\Specifications\ShippingCountrySpecification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function checkSpecifications()
    {
        $order1 = Order::create(['status' => 'completed', 'total_amount' => 150, 'shipping_country' => 'USA']);
        $order2 = Order::create(['status' => 'pending', 'total_amount' => 50, 'shipping_country' => 'Canada']);

        $completedSpec = new CompletedOrderSpecification();
        $minAmountSpec = new MinimumAmountSpecification(100);
        $shippingCountrySpec = new ShippingCountrySpecification('USA');

        // Combine specifications using AND
        $andSpec = new AndSpecification($completedSpec, $minAmountSpec);

        // Combine specifications using OR
        $orSpec = new OrSpecification($completedSpec, $shippingCountrySpec);

        // Check both specifications for Order 1
        $order1AndResult = $andSpec->isSatisfiedBy($order1) ? 'Order 1 passes the AND specifications.' : 'Order 1 does not pass the AND specifications.';
        $order1OrResult = $orSpec->isSatisfiedBy($order1) ? 'Order 1 passes the OR specifications.' : 'Order 1 does not pass the OR specifications.';

        // Check both specifications for Order 2
        $order2AndResult = $andSpec->isSatisfiedBy($order2) ? 'Order 2 passes the AND specifications.' : 'Order 2 does not pass the AND specifications.';
        $order2OrResult = $orSpec->isSatisfiedBy($order2) ? 'Order 2 passes the OR specifications.' : 'Order 2 does not pass the OR specifications.';

        return response()->json([
            'order1_and' => $order1AndResult,
            'order1_or' => $order1OrResult,
            'order2_and' => $order2AndResult,
            'order2_or' => $order2OrResult,
        ]);
    }

}
