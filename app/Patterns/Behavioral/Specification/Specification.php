<?php

namespace App\Patterns\Behavioral\Specification;
use App\Models\Order;

interface Specification
{
    public function isSatisfiedBy(Order $order): bool;
}
