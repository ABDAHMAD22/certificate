<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CustomExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $model;
    public $id;
    private $error = '';
    private $lang;

    public function __construct($model, $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!Arr::get($value, 'en') || !Arr::get($value, 'ar')) {
            $this->error = 'The :attribute is required';
            return false;
        }
        return true;
//        $modelEn = $this->model::where(function ($q) use ($attribute, $value) {
//            $q->where(DB::raw('JSON_EXTRACT(' . $attribute . ', "$.en")'), 'like', '"' . $value['en'] . '"');
//            if (isset($this->id) && $this->id) {
//                $q->where('id', '!=', $this->id);
//            }
//        })->count();
//        $this->error = 'The :attribute.en is already exists.';
//        if ($modelEn)
//            return $modelEn === 0;
//
//        $modelAr = $this->model::where(function ($q) use ($attribute, $value) {
//            $q->where(DB::raw('JSON_EXTRACT(' . $attribute . ', "$.ar")'), 'like', '"' . $value['ar'] . '"');
//            if (isset($this->id) && $this->id) {
//                $q->where('id', '!=', $this->id);
//            }
//        })->count();
//        $this->error = 'The :attribute.ar is already exists.';
//        return $modelAr === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error;
    }
}
