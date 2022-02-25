<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_en', 'email', 'mobile', 'password', 'member_no', 'country_id', 'city_id', 'region',
        'manager_name', 'training_licence', 'commercial_register', 'training_licence_no',
        'commercial_register_no', 'account_manager', 'account_manager_mobile', 'account_manager_email',
        'image', 'logo', 'status', 'reset_code', 'is_completed', 'social_links',
    ];

//    public function setSocialLinksAttribute($value)
//    {
//        $this->attributes['social_links'] = json_encode($value);
//    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function editors()
    {
        return $this->hasMany(Editor::class);
    }

    public function permits() {
        return $this->belongsToMany(Permit::class, 'user_permits')->withTimestamps();
    }

    public function checkPermits($value)
    {
        return self::permits()
            ->where('key', $value)->get();
    }
    public function getHasUpdateCertificateAttribute()
    {
        return count(self::checkPermits('update_certificate'));
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function getHasSubscriptionAttribute()
    {
        return count(self::payments()->get());
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function ads()
    {
        return $this->hasMany(Ads::class);
    }

    public function certificateRequests()
    {
        return $this->hasMany(CertificateRequest::class);
    }

    public function adsRequests()
    {
        return $this->hasMany(AdsRequest::class);
    }

    public function editorRequests()
    {
        return $this->hasMany(EditorRequest::class);
    }

    public function specialDesignRequests()
    {
        return $this->hasMany(SpecialDesignRequest::class);
    }

    public function specialDesigns()
    {
        return $this->belongsToMany(SpecialDesign::class, 'special_designs')->withTimestamps();
    }

    public static function user_id()
    {
        $user_id = null;
        if (\Auth::guard('web')->check()) {
            $user_id = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $user_id = \Auth::guard('editor')->user()->user_id;
        }
        return $user_id;
    }

    public static function certificatesNo($user_id=null)
    {
        $user_id = self::user_id() ?? $user_id;
        return (int)Payment::where('user_id', '=', $user_id)
            ->where('status_id', '=', 2)
            ->sum(\DB::raw('certificates_no + certificates_free_no'));
    }

    public static function usedCertificatesNo($user_id=null)
    {
        $user_id = self::user_id() ?? $user_id;
        return CertificateStudent::where('user_id', '=', $user_id)
            ->where('is_completed', '=', 1)->count();
    }

    public static function hasCertificates($user_id=null)
    {
        return self::certificatesNo($user_id) - self::usedCertificatesNo($user_id) > 0;
    }

    public static function adsNo($user_id=null)
    {
        $user_id = self::user_id() ?? $user_id;
        return (int)Payment::where('user_id', '=', $user_id)
            ->where('status_id', '=', 2)
            ->sum('ads_no');
    }

    public static function usedAdsNo($user_id=null)
    {
        $user_id = self::user_id() ?? $user_id;
        return Ads::where('user_id', '=', $user_id)->count();
    }

    public static function hasAds($user_id=null)
    {
        return self::adsNo($user_id) - self::usedAdsNo($user_id) > 0;
    }

    protected $appends = ['status_value', 'image_path'];

    public $attributes = ['status' => self::STATUS_ACTIVE, 'is_completed' => 0];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
    ];

    const SOCIAL_ACCOUNTS = [
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'whatsapp',
        'website',
    ];
    const SOCIAL_ACCOUNTS_LIST = [
        'facebook' => 'فيسبوك',
        'twitter' => 'تويتر',
        'snapchat' => 'سناب شات',
        'instagram' => 'انستجرام',
        'linkedin' => 'لينكدان',
        'whatsapp' => 'واتساب',
        'website' => 'الموقع الالكتروني',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'social_links' => 'array'
    ];

    public function getStatusValueAttribute()
    {
        return isset($this->attributes["status"]) && $this->attributes["status"] ? trans("app.status_{$this->attributes["status"]}") : trans("app.status_{$this->attributes["status"]}");
    }

    public function getImagePathAttribute()
    {
        return isset($this->attributes["image"]) && $this->attributes["image"] ? Storage::url($this->attributes["image"]) : asset('site/img/avatar-img.svg');
    }

    public static function getByEmail($value)
    {
        return self::where("email", strtolower($value))->first();
    }

    public static function getByMobile($value)
    {
        return self::where("mobile", strtolower($value))->first();
    }
}
