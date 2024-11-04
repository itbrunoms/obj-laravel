<?php

namespace App\Services;

use App\Enum\TransactionType;
use App\Interfaces\TransactionInterface;
use Illuminate\Database\Eloquent\Model;

class CreditCardTransactionService extends BaseTransationService implements TransactionInterface
{
    public function __construct(public $transactionType)
    {
        $this->transactionType = TransactionType::CARTAO_CREDITO;
    }

    public function process(Model $account, $value): Model
    {
        $valueWithTax = $this->getValueWithTax($value);
        $account->balance -= $valueWithTax;
    }
}
