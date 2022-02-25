<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsContent extends Model
{
    protected $fillable = ['title', 'ads_id'];

    public function ads() {
        return $this->belongsTo(Ads::class);
    }
}
