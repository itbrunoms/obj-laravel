<?php

namespace App\Exceptions;

class AccountExists extends \Exception
{
    public function __construct($message = 'Conta informada já existe', $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
