<?php

namespace App\Services\Transaction;

use App\Exceptions\InsufficientFundsException;
use App\Models\Account;

class CheckAccountBalance
{
    public function check(Account $account, $value)
    {
        if ($account->balance < $value) {
            throw new InsufficientFundsException();
        }
    }
}
