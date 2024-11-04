<?php

namespace App\Http\Controllers\Api;

use App\Factories\TransactionServiceFactory;
use Illuminate\Http\Request;

class TransactionController
{
    public function __construct(public TransactionServiceFactory $transactionServiceFactory)
    {
        $this->transactionServiceFactory = $transactionServiceFactory;
    }

    public function store(Request $request)
    {
        $transactionService = $this->transactionServiceFactory->create($transactionType);

        $value = $request->value;
        $valueWithTax = $transactionService->getValueWithTax($value);

        $checkAccountBalance = new CheckAccountBalance($request->account, $valueWithTax);
        $checkAccountBalance->checkBalance($valueWithTax);

        $transactionService->processTransaction($valueWithTax);

        return response()->json(['message' => 'Transação realizada com sucesso']);
    }
}
