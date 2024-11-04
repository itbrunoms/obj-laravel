<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AccountNotFound;
use App\Factories\TransactionServiceFactory;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Requests\TransactionRequest;
use App\Repositories\AccountRepository;
use App\Responses\AccountResponse;
use App\Services\Account\ProcessTransactionAccount;

class TransactionController
{
    use ApiResponseTrait;

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

            $accountResponse = new AccountResponse($account->toArray());
            return $this->apiResponse($accountResponse);

        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
