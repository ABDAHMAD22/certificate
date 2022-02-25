<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [];

    public function templates() {
        return $this->morphMany(Template::class, 'templatable');
    }
}
