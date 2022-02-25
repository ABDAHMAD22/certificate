<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsTime extends Model
{
    protected $fillable = ['from', 'to', 'ads_id'];

    public function ads() {
        return $this->belongsTo(Ads::class);
    }
}
