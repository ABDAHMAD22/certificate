<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    protected $fillable = ['name', 'word'];

    public function certificates() {
        return $this->hasMany(Certificate::class);
    }
}
