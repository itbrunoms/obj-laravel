<?php

namespace Tests;

use App\Enum\TransactionType;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Services\Account\AccountRequestService;

beforeEach(function () {
    $this->accountRepository = \Mockery::mock(AccountRepository::class);
    $this->accountService = \Mockery::mock(AccountRequestService::class);
});

it('AccountDontExists', function () {
    $enum = TransactionType::CARTAO_DEBITO;

    $request = \Mockery::mock(TransactionRequest::class);
    $request->shouldReceive('validated', 'all')
        ->andReturn([
            'numero_conta' => rand(1000, 9999),
            'forma_pagamento' => $enum->value,
            'valor' => 10
        ]);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->andReturn(null);

    $response = app()->make(TransactionController::class)->process($request, $this->accountRepository);

    expect($response->getStatusCode())->toBe(404);
});

it('DebitCardTransaction', function () {
    $enum = TransactionType::CARTAO_DEBITO;
    $value = 10;

    $account = Account::factory()->create([
        'account_number' => rand(1000, 9999),
        'balance' => 1000
    ]);

    $totalWithTax = $value + ($value / 100 * $enum->getTax());
    $valueAfterProcess = $account->balance - $totalWithTax;

    $request = \Mockery::mock(TransactionRequest::class);
    $request->shouldReceive('validated', 'all')
        ->andReturn([
            'numero_conta' => $account->account_number,
            'forma_pagamento' => $enum->value,
            'valor' => $value
        ]);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($account->account_number)
        ->andReturn($account);

    $response = app()->make(TransactionController::class)->process($request, $this->accountRepository);
    $responseData = $response->original;

    list($balanceForCheck, $accountBalance) = [number_format($valueAfterProcess, 2), number_format($responseData['saldo'], 2)];

    expect($accountBalance)->toBe($balanceForCheck);
});

it('CreditCardTransaction', function () {
    $enum = TransactionType::CARTAO_DEBITO;
    $value = 10;

    $account = Account::factory()->create([
        'account_number' => rand(1000, 9999),
        'balance' => 1000
    ]);

    $totalWithTax = $value + ($value / 100 * $enum->getTax());
    $valueAfterProcess = $account->balance - $totalWithTax;

    $request = \Mockery::mock(TransactionRequest::class);
    $request->shouldReceive('validated', 'all')
        ->andReturn([
            'numero_conta' => $account->account_number,
            'forma_pagamento' => $enum->value,
            'valor' => $value
        ]);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($account->account_number)
        ->andReturn($account);

    $response = app()->make(TransactionController::class)->process($request, $this->accountRepository);
    $responseData = $response->original;

    list($balanceForCheck, $accountBalance) = [number_format($valueAfterProcess, 2), number_format($responseData['saldo'], 2)];

    expect($accountBalance)->toBe($balanceForCheck);
});

it('PixTransaction', function () {
    $enum = TransactionType::PIX;
    $value = 10;

    $account = Account::factory()->create([
        'account_number' => rand(1000, 9999),
        'balance' => 1000
    ]);

    $totalWithTax = $value + ($value / 100 * $enum->getTax());
    $valueAfterProcess = $account->balance - $totalWithTax;

    $request = \Mockery::mock(TransactionRequest::class);
    $request->shouldReceive('validated', 'all')
        ->andReturn([
            'numero_conta' => $account->account_number,
            'forma_pagamento' => $enum->value,
            'valor' => $value
        ]);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($account->account_number)
        ->andReturn($account);

    $response = app()->make(TransactionController::class)->process($request, $this->accountRepository);
    $responseData = $response->original;

    list($balanceForCheck, $accountBalance) = [number_format($valueAfterProcess, 2), number_format($responseData['saldo'], 2)];

    expect($accountBalance)->toBe($balanceForCheck);
});
