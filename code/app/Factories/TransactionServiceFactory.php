<?php

namespace App\Factories;

use App\Enum\TransactionType;
use App\Interfaces\TransactionInterface;
use App\Services\CreditCardTransactionService;

class TransactionServiceFactory
{
    public static function create(TransactionType $transactionType): TransactionInterface
    {
        switch ($transactionType->value) {
            case 'C':
                return new CreditCardTransactionService($transactionType);
            case 'D':
                return new DebitCardTransactionService($transactionType);
            case 'P':
                return new PixTransactionService($transactionType);
            default:
                throw new \Exception('Invalid transaction type');
        }
    }
}
