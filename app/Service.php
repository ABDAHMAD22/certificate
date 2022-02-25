<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    public $translatable = ['title', 'description', 'details'];

    protected $fillable = ['title', 'description', 'details', 'icon'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'details' => 'array',
    ];
}
