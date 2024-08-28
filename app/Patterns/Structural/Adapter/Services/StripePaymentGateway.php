<?php

namespace App\Patterns\Structural\Adapter\Services;

use App\Patterns\Structural\Adapter\PaymentGateway;

class StripePaymentGateway implements PaymentGateway
{

    public function charge($amount)
    {
        return "Charged {$amount} using Stripe.<br>";
    }
}
