<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    protected $fillable = ['process_id', 'status', 'amount', 'source_name', 'source_company',
        'package_id', 'user_id', 'editor_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }
}
