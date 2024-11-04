<?php

namespace Tests;

use App\Http\Controllers\Api\AccountController;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Services\Account\AccountRequestService;

use Illuminate\Http\Request;
use function Pest\Laravel\getJson;

beforeEach(function () {
    $this->accountRepository = \Mockery::mock(AccountRepository::class);
    $this->accountService = \Mockery::mock(AccountRequestService::class);
});


it('account dont exists', function () {
    $response = getJson('/conta?numero_conta=78');
    $response->assertStatus(404);
});

it('get data account exist', function () {
    $account = Account::factory()->create();

    $request = \Mockery::mock(Request::class);
    $request->shouldReceive('query')
        ->with('numero_conta')
        ->andReturn($account->account_number);

    $this->accountRepository
        ->shouldReceive('findByAccountNumber')
        ->with($account->account_number)
        ->andReturn($account);

    $response = app()->make(AccountController::class)->index($request, $this->accountRepository);
    $responseData = $response->original;

    expect($responseData['numero_conta'])->toBe($account->account_number);
    expect($responseData['saldo'])->toBe($account->balance);
    expect($response->getStatusCode())->toBe(200);
});

//it('create account but account exists', function () {
//    $account = Account::factory()->create();
//
//    $request = \Mockery::mock(CreateAccountRequest::class);
//    $request->shouldReceive('validated')
//        ->andReturn(['numero_conta' => $account->account_number, 'saldo' => $account->balance]);
//
//    $this->accountRepository
//        ->shouldReceive('findByAccountNumber')
//        ->with($account->account_number)
//        ->andReturn($account);
//
//    $response = app()->make(AccountController::class)->store($request, $this->accountRepository);
//    $responseData = $response->original;
//
//    expect($responseData['numero_conta'])->toBe($account->account_number);
//    expect($responseData['saldo'])->toBe($account->balance);
//    expect($response->getStatusCode())->toBe(200);
//});



