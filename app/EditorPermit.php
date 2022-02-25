<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditorPermit extends Model
{
    protected $fillable = ['editor_id', 'permit_id'];

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function permit()
    {
        return $this->belongsTo(Permit::class);
    }
}
