<?php

namespace App\Exceptions;

class AccountNotFound extends \Exception
{
    public function __construct($message = 'Conta informada não existe', $code = 404)
    {
        parent::__construct($message, $code);
    }
}
