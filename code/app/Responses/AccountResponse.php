<?php

namespace App\Responses;

use Illuminate\Http\JsonResponse;

class AccountResponse extends JsonResponse
{
    public function __construct(array $data, $status = 200)
    {
        $data = [
            'numero_conta' => $data['account_number'],
            'saldo' => $data['balance'],
        ];

        parent::__construct($data, $status);
    }
}
