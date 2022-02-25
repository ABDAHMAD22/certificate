<?php

namespace App\Http\Requests\User;

use App\Classes\Helpers;
use Illuminate\Validation\Rule;

class AdsReqRequest extends SuperRequest
{
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['price'] = Helpers::convertToEnglish($input['price']);
        $input['mobile'] = Helpers::convertToEnglish($input['mobile']);
        $input['hours_no'] = Helpers::convertToEnglish($input['hours_no']);
        $this->replace($input);
        return $this->all();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => ["required"],
            "subtitle" => ["nullable"],
            "trainer_name" => ["required"],
            "trainer_about" => ["nullable"],
            'attached_image' => [(!$this->ads && !$this->media_id)?'required':'nullable', 'file', 'max:2048', 'image', 'dimensions:min_width=400,min_height=400'],
            'media_id' => ['nullable'],
            'price' => ['required', 'numeric'],
            "mobile" => ["required", 'numeric', 'digits_between:10,15'],
            "date_type" => ["required"],
            "start_date" => ["required", "date", "date_format:Y-m-d"],
            "end_date" => ["nullable", "date", "date_format:Y-m-d", "after:start_date"],
            "hours_no" => ["required", "integer"],
            "place" => ["required"],
            "contents" => ["nullable", "array"],
            "features" => ["nullable", "array"],
            "times" => ["nullable", "array"],
            'times.*.from' => ['required'],
            'times.*.to' => ['required'],
            "ads_type_id" => ["required", Rule::exists('ads_types', 'id')],
            "target_id" => ["required", Rule::exists('targets', 'id')],
            "template_id" => ["required", Rule::exists('templates', 'id')],
            //"font_id" => ["required", Rule::exists('fonts', 'id')],
        ];
    }
}
