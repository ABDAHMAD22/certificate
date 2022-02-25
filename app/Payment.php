<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['price', 'certificates_no', 'certificates_free_no', 'ads_no', 'cards_no', 'user_id', 'status_id', 'payment_type_id'];

    const COMPANY_VISA = 'visa';
    const COMPANY_MADA = 'mada';
    const COMPANY_MASTER = 'master';
    const COMPANIES = [
        self::COMPANY_VISA,
        self::COMPANY_MADA,
        self::COMPANY_MASTER,
    ];
    const COMPANIES_LIST = [
        self::COMPANY_VISA => 'Visa',
        self::COMPANY_MADA => 'Mada',
        self::COMPANY_MASTER => 'Master',
    ];

    public function paymentable()
    {
        return $this->morphto();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
