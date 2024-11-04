<?php

namespace App\Services\Transaction;

use App\Enum\TransactionType;

class BaseTransactionService
{
    public function __construct(public TransactionType $transactionType)
    {
        $this->transactionType = $transactionType;
    }

    public function getValueWithTax($value)
    {
        $tax = $this->transactionType->getTax();
        return $value + ($value * $tax / 100);
    }
}
