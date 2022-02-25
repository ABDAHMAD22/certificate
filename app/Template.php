<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['image', 'status', 'type_id', 'font_id', 'settings'];

    protected $casts = [
        'settings' => 'array'
    ];

    public function certificates() {
        return $this->hasMany(Certificate::class);
    }

    public function ads() {
        return $this->hasMany(Ads::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function font()
    {
        return $this->belongsTo(Font::class);
    }

//    public function templatable() {
//        return $this->morphto();
//    }
}
