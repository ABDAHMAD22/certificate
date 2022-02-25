<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Certificate extends Model
{
    protected $fillable = ['template_id', 'certificate_type_id', 'type', 'language_id', 'title', 'subtitle',
        'accreditation_no', 'date_type', 'start_date', 'end_date', 'days_no', 'hours_no', 'trainer_name', 'user_id',
        'editor_id', 'parent_id',
    ];

    protected $appends = ['date_type_letter'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function certificateType()
    {
        return $this->belongsTo(CertificateType::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function certificateStudent()
    {
        return $this->hasMany(CertificateStudent::class);
    }

    public function getDateTypeLetterAttribute()
    {
        return isset($this->attributes["date_type"]) && $this->attributes["date_type"] ? trans("app.date_type_{$this->attributes["date_type"]}") : trans("app.date_type_{$this->attributes["date_type"]}");
    }

//    public function templates()
//    {
//        return $this->morphMany(Template::class, 'templatable');
//    }
}
