<?php

namespace Tests;

use App\Http\Controllers\Api\AccountController;
use App\Http\Requests\CreateAccountRequest;
use App\Repositories\AccountRepository;
use App\Services\Account\AccountRequestService;
use App\Http\Responses\AccountResponse;


beforeEach(function () {
    $this->accountRepository = \Mockery::mock(AccountRepository::class);
    $this->accountService = \Mockery::mock(AccountRequestService::class);
});

it('successfully creates an account and returns a response', function () {
    $data = ['numero_conta' => '12345', 'saldo' => 1000];
    $request = \Mockery::mock(CreateAccountRequest::class);
    $request->shouldReceive('validated')->andReturn($data);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($data['numero_conta'])
        ->andReturn(null);

    $this->accountRepository
        ->shouldReceive('createAccount')
        ->with($data)
        ->andReturn(['account_number' => '12345', 'balance' => 1000]);

    $response = app()->make(AccountController::class)->store($request);

    expect($response->getData())->toEqual(new AccountResponse(['numero_conta' => '12345', 'saldo' => 1000]));
    expect($response->getStatusCode())->toBe(200);
});
