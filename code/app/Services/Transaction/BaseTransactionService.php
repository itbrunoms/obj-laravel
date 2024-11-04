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
        $tax = $value / 100 * $this->transactionType->getTax();
        return $value + $tax;
    }
}
