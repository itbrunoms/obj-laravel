<?php

namespace App\Http\Requests;

use App\Interfaces\RequestModelInterface;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'numero_conta' => ['required', 'integer'],
            'saldo' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'numero_conta.required' => 'O campo número da conta é obrigatório',
            'numero_conta.integer' => 'O campo número da conta deve ser um número inteiro',
            'saldo.required' => 'O campo saldo é obrigatório',
            'saldo.numeric' => 'O campo saldo deve ser um número',
            'saldo.min' => 'O campo saldo deve ser maior ou igual a 0.1',
        ];
    }
}

