<?php

namespace App\Patterns\Behavioral\Specification\Specifications;
use App\Models\Order;
use App\Patterns\Behavioral\Specification\Specification;

class CompletedOrderSpecification implements Specification
{
    public function isSatisfiedBy(Order $order): bool
    {
        return $order->status === 'completed';
    }
}
