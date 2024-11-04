<?php

namespace Tests\Unit;

use App\Repositories\AccountRepository;
use App\Services\Account\AccountRequestService;
use Mockery;

beforeEach(function () {
    $this->accountRepository = Mockery::mock(AccountRepository::class);
    $this->service = new AccountRequestService($this->accountRepository);
});

it('creates a new account when it does not exist', function () {
    $data = ['account_number' => '12345', 'balance' => 1000];

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($data['account_number'])
        ->andReturn(null);

    $this->accountRepository
        ->shouldReceive('createAccount')
        ->with($data)
        ->andReturn(['account_number' => '12345', 'balance' => 1000]);

    $account = $this->service->process($data);

    expect($account)->toEqual(['account_number' => '12345', 'balance' => 1000]);
});
