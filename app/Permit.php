<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $fillable = ['name', 'key', 'type'];

    public function editors() {
        return $this->belongsToMany(Editor::class, 'editor_permits')->withTimestamps();
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_permits')->withTimestamps();
    }

    const TYPE_USER = 'user';
    const TYPE_EDITOR = 'editor';
    const TYPES = [
        self::TYPE_USER => 'User',
        self::TYPE_EDITOR => 'Editor',
    ];
    const TYPES_LIST = [
        self::TYPE_USER,
        self::TYPE_EDITOR,
    ];
}
