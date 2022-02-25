<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDesignRequest extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'details', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
