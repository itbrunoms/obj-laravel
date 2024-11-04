<?php

namespace App\Exceptions;

class InsufficientFundsException extends \Exception
{
    public function __construct($message = 'Saldo insuficiente', $code = 404, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
