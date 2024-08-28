<?php
namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions;

use Exception;

class NoProductAvailableException extends Exception
{
    protected $message = 'The product is not available.';
}

