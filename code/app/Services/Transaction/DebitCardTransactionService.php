<?php

namespace App\Services\Transaction;

use App\Enum\TransactionType;
use App\Interfaces\TransactionInterface;
use App\Services\Transaction\BaseTransactionService;
use Illuminate\Database\Eloquent\Model;

class DebitCardTransactionService extends BaseTransactionService implements TransactionInterface
{
    public function process(Model $account, $value): Model
    {
        $valueWithTax = $this->getValueWithTax($value);
        $account->balance -= $valueWithTax;
        $account->save();

        return $account;
    }
}
