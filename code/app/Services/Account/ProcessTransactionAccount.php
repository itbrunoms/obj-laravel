<?php

namespace App\Services\Account;

use App\Interfaces\TransactionInterface;
use App\Models\Account;
use App\Services\Transaction\CheckAccountBalance;
use Illuminate\Database\Eloquent\Model;

class ProcessTransactionAccount
{
    public function __construct(TransactionInterface $transaction, Account $account, $value)
    {
        $this->transaction = $transaction;
        $this->account = $account;
        $this->value = $value;
    }

    public function run(): Model
    {
        app(CheckAccountBalance::class)->check($this->account, $this->value);
        return $this->transaction->process($this->account, $this->value);
    }
}
