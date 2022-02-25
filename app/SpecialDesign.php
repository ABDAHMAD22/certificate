<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDesign extends Model
{
    protected $fillable = ['design_service_id', 'user_id'];

    public function designService() {
        return $this->belongsTo(DesignService::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function specialDesignServices() {
        return $this->hasMany(SpecialDesignService::class);
    }
}
