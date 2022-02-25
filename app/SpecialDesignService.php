<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDesignService extends Model
{
    protected $fillable = ['special_design_id', 'special_design_sub_service_id', 'price'];

    public function specialDesign()
    {
        return $this->belongsTo(SpecialDesign::class);
    }

    public function specialDesignSubService() {
        return $this->belongsTo(DesignSubService::class);
    }
}
