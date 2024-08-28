<?php

namespace App\Patterns\Behavioral\Specification\Specifications;
use App\Models\Order;
use App\Patterns\Behavioral\Specification\Specification;

class MinimumAmountSpecification implements Specification
{
    private $minimumAmount;

    public function __construct($minimumAmount)
    {
        $this->minimumAmount = $minimumAmount;
    }

    public function isSatisfiedBy(Order $order): bool
    {
        return $order->total_amount >= $this->minimumAmount;
    }
}
