<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'description', 'image', 'button_text', 'button_icon', 'button_link'];
}
