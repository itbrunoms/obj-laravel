<?php

namespace App\Http\Controllers\Api;

use App\Dto\AccountDto;
use App\Exceptions\AccountNotFound;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Requests\CreateAccountRequest;
use App\Repositories\AccountRepository;
use App\Responses\AccountResponse;
use App\Services\Account\AccountRequestService;
use Illuminate\Http\Request;

class AccountController
{
    use ApiResponseTrait;

    public function index(Request $request, AccountRepository $accountRepository)
    {
        try {
            $account = $accountRepository->findByAccountNumber($request->numero_conta);
            if (!$account) throw new AccountNotFound();

            $accountRespose = new AccountResponse($account->toArray());
            return $this->apiResponse($accountRespose);
        } catch (\Throwable $e) {
            return $this->apiResponse(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function store(CreateAccountRequest $request)
    {
        $dto = AccountDto::buildFromRequest($request);

        try {
            $account = app(AccountRequestService::class)->process($dto->toArray());

        } catch (\Exception $e) {
            return $this->apiResponse(['message' => $e->getMessage()], 400);
        }

        $accountResponse = new AccountResponse($account->toArray());
        return $this->apiResponse($accountResponse);
    }
}
