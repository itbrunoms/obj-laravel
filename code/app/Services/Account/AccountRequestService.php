<?php

namespace App\Services\Account;

use App\Exceptions\AccountExists;
use App\Repositories\AccountRepository;

class AccountRequestService
{
    public function __construct(private AccountRepository $accountRepository)
    {
    }

    public function process($data)
    {
        $account = $this->accountRepository->findByAccountNumber($data['account_number']);

        if (!$account) {
            $account = $this->accountRepository->createAccount($data);
            return $account;
        }

        throw new AccountExists();

        /// na documentação nao deixa claro o que fazer quando a conta existe, então fiz a implementação de atualizar o saldo caso necessário
        //$account = $this->accountRepository->updateBalance($account, $data['balance']);
        //return $account;
    }
}
