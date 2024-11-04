<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface TransactionInterface
{
    public function process(Model $account, $value): Model;
}
