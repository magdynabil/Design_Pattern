<?php
namespace App\Patterns\Behavioral\ChainOfResponsibility\Order\Exceptions;

use Exception;

class NoLoyalUserException extends Exception
{
    protected $message = 'The user is not loyal enough to proceed with the order.';
}

