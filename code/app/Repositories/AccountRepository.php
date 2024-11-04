<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    public function findByAccountNumber(int $number): Account|null
    {
        $account = Account::where('account_number', $number)->first();
        return $account;
    }

    public function createAccount(array $data)
    {
        $account = Account::create($data);
        return $account;
    }

    public function updateBalance(Account $account, float $balance): Account
    {
        $account->balance = $balance;
        $account->save();

        return $account;
    }
}
