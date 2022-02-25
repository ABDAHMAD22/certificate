<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $translatable = ['title', 'details'];

    protected $fillable = ['title', 'details', 'slug', 'active'];

    protected $casts = [
        'title' => 'array',
        'details' => 'array',
    ];
}
