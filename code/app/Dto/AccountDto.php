<?php

namespace App\Dto;

use App\Http\Requests\CreateAccountRequest;

class AccountDto
{
    public function __construct(
        public string $accountNumber,
        public float  $balance
    )
    {
    }

    public static function buildFromRequest(CreateAccountRequest $request)
    {
        $data = $request->validated();
        return new self(
            accountNumber: $data['numero_conta'],
            balance: $data['saldo']
        );
    }

    public function toArray(): array
    {
        return [
            'account_number' => $this->accountNumber,
            'balance' => $this->balance
        ];
    }
}
