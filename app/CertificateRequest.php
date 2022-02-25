<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'user_id', 'editor_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }
}
