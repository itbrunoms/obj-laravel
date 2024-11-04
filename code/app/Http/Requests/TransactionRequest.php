<?php

namespace App\Http\Requests;

use App\Enum\TransactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'numero_conta' => ['required', 'int'],
            'forma_pagamento' => ['required', 'string', Rule::in(TransactionType::toArray())],
            'valor' => ['required', 'numeric']
        ];
    }

    public function messages(): array
    {
        return [
            'numero_conta.required' => 'O campo número da conta é obrigatório',
            'numero_conta.int' => 'O campo número da conta deve ser um número inteiro',
            'forma_pagamento.required' => 'O campo forma de pagamento é obrigatório',
            'forma_pagamento.string' => 'O campo forma de pagamento deve ser uma string',
            'forma_pagamento.in' => 'O campo forma de pagamento deve ser um dos valores: ' . implode(', ', TransactionType::toArray()),
            'valor.required' => 'O campo valor é obrigatório',
            'valor.numeric' => 'O campo valor deve ser um número'
        ];
    }
}
