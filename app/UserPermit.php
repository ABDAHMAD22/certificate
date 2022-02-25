<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermit extends Model
{
    protected $fillable = ['user_id', 'permit_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permit()
    {
        return $this->belongsTo(Permit::class);
    }
}
