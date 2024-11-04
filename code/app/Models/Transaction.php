<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'type'];

    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
