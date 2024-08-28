<?php
namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions;

use Exception;

class NoShipmentAvailableException extends Exception
{
    protected $message = 'No shipment truck is available for the selected date.';
}
