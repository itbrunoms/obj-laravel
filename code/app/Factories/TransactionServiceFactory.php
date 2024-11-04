<?php

namespace App\Factories;

use App\Enum\TransactionType;
use App\Interfaces\TransactionInterface;
use App\Services\Transaction\CreditCardTransactionService;
use App\Services\Transaction\DebitCardTransactionService;
use App\Services\Transaction\PixTransactionService;

class TransactionServiceFactory
{
    public static function create(string $transactionType): TransactionInterface
    {
        switch ($transactionType) {
            case 'C':
                return new CreditCardTransactionService(TransactionType::CARTAO_CREDITO);
            case 'D':
                return new DebitCardTransactionService(TransactionType::CARTAO_DEBITO);
            case 'P':
                return new PixTransactionService(TransactionType::PIX);
            default:
                throw new \Exception('Invalid transaction type');
        }
    }
}
