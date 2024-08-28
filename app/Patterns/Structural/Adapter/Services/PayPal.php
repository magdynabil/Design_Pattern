<?php

namespace App\Patterns\Structural\Adapter\Services;

class PayPal
{

    public function makePayment($amount)
    {
        return "Charged {$amount} using PayPal.<br>";
    }
}
