<?php

namespace App\Patterns\Structural\Adapter\Adapters;

use App\Patterns\Structural\Adapter\PaymentGateway;

use App\Patterns\Structural\Adapter\Services\PayPal;

class PayPalAdapter implements PaymentGateway
{
    protected $payPal;

    public function __construct(PayPal $payPal)
    {
        $this->payPal = $payPal;
    }

    public function charge($amount)
    {
        return $this->payPal->makePayment($amount);
    }
}
