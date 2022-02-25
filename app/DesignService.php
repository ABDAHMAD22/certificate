<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignService extends Model
{
    protected $fillable = ['name'];

    public function designSubServices() {
        return $this->hasMany(DesignSubService::class);
    }

    public function specialDesigns() {
        return $this->belongsToMany(SpecialDesign::class, 'special_designs')->withTimestamps();
    }
}
