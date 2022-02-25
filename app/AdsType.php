<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsType extends Model
{
    protected $fillable = ['name'];

    public function ads() {
        return $this->hasMany(Ads::class);
    }
}
