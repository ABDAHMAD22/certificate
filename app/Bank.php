<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name', 'account_no'];

    public function bankTransfers() {
        return $this->hasMany(BankTransfer::class);
    }
}
