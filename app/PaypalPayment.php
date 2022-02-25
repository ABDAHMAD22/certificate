<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model
{
    protected $fillable = ['payment_id', 'payer_id', 'payer_email', 'amount', 'currency', 'status'];

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
