<?php

namespace App\Services;

use App\Exceptions\InsufficientFundsException;

class CheckAccountBalance
{
    public function __construct(public $account, public $value)
    {
        $this->account = $account;
        $this->value = $value;
    }

    public function checkBalance($value)
    {
        if ($this->account->balance < $value) {
            throw new InsufficientFundsException();
        }
    }
}
