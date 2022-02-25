<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Editor extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'image', 'email', 'password', 'status', 'user_id', 'reset_code'];

    protected $appends = ['status_value', 'image_path'];

    public $attributes = ['status' => self::STATUS_ACTIVE];

    protected $with = ['permits'];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatusValueAttribute()
    {
        return isset($this->attributes["status"]) && $this->attributes["status"] ? trans("app.status_{$this->attributes["status"]}") : trans("app.status_{$this->attributes["status"]}");
    }

    public function getImagePathAttribute()
    {
        return isset($this->attributes["image"]) && $this->attributes["image"] ? Storage::url($this->attributes["image"]) : asset('site/img/avatar-img.svg');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permits() {
        return $this->belongsToMany(Permit::class, 'editor_permits')->withTimestamps();
    }

    public function checkPermits($value)
    {
        return self::permits()
            ->where('key', $value)->get();
    }

    public function hasCertificate()
    {
        return count(self::checkPermits('certificate'));
    }
    public function hasAds()
    {
        return count(self::checkPermits('ads'));
    }
    public function hasSubscription()
    {
        return count(self::checkPermits('subscription'));
    }

    public static function getByEmail($value)
    {
        return self::where("email", strtolower($value))->first();
    }
}
