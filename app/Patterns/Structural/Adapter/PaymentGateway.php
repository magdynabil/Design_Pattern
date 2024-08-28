<?php

namespace App\Patterns\Structural\Adapter;


interface PaymentGateway
{
    public function charge($amount);
}
