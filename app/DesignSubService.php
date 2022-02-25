<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignSubService extends Model
{
    protected $fillable = ['name', 'price', 'design_service_id'];

    public function designService() {
        return $this->belongsTo(DesignService::class);
    }
}
