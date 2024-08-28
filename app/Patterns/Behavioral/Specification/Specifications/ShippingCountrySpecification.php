<?php

namespace App\Patterns\Behavioral\Specification\Specifications;
use App\Models\Order;
use App\Patterns\Behavioral\Specification\Specification;

class ShippingCountrySpecification implements Specification
{
    private $country;

    public function __construct($country)
    {
        $this->country = $country;
    }

    public function isSatisfiedBy(Order $order): bool
    {
        return $order->shipping_country === $this->country;
    }
}
