<?php

namespace App\Patterns\Behavioral\Specification;

use App\Models\Order;

class AndSpecification implements Specification
{
    private $spec1;
    private $spec2;

    public function __construct(Specification  $spec1, Specification $spec2)
    {
        $this->spec1 = $spec1;
        $this->spec2 = $spec2;
    }

    public function isSatisfiedBy(Order $order): bool
    {
        return $this->spec1->isSatisfiedBy($order) && $this->spec2->isSatisfiedBy($order);
    }
}
