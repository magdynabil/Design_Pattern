<?php

namespace App\Http\Controllers;

use App\Patterns\Structural\Adapter\Adapters\PayPalAdapter;
use App\Patterns\Structural\Adapter\PaymentGateway;
use App\Patterns\Structural\Adapter\Services\PayPal;
use App\Patterns\Structural\Adapter\Services\StripePaymentGateway;
class PaymentController extends Controller
{

    public function example()
    {
        $stripe = new StripePaymentGateway();
        echo $this->processPayment($stripe, 100);

        $payPal = new PayPal();
        $payPalAdapter = new PayPalAdapter($payPal);
        echo $this->processPayment($payPalAdapter, 100);
    }
    public function processPayment(PaymentGateway $paymentGateway, $amount)
    {
        return $paymentGateway->charge($amount);
    }

}
