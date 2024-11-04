<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AccountNotFound;
use App\Factories\TransactionServiceFactory;
use App\Http\Requests\TransactionRequest;
use App\Repositories\AccountRepository;
use App\Services\Account\ProcessTransactionAccount;
use App\Services\Transaction\CheckAccountBalance;
use Illuminate\Http\Request;

class TransactionController
{
    public function __construct(
        public TransactionServiceFactory $transactionServiceFactory,
        public AccountRepository         $accountRepository)
    {
    }

    public function process(TransactionRequest $request)
    {
        $transactionService = $this->transactionServiceFactory->create($request->forma_pagamento);
        $valueWithTax = $transactionService->getValueWithTax($request->valor);

        try {
            $account = $this->accountRepository->findByAccountNumber($request->numero_conta);
            if (!$account) throw new AccountNotFound();

            $processTransaction = new ProcessTransactionAccount($transactionService, $account, $valueWithTax);
            $account = $processTransaction->run();




        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['message' => 'Transação realizada com sucesso']);
    }
}
