<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'price', 'certificates_no', 'certificates_free_no', 'ads_no', 'cards_no'];

    protected $appends = ['payment_price'];

    public function getPaymentPriceAttribute()
    {
        return $this->price * 100 ?? 0;
    }
}
