<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditorRequest extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
