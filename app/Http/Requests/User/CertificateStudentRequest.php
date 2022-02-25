<?php

namespace App\Http\Requests\User;

use App\Classes\Helpers;
use Illuminate\Validation\Rule;

class CertificateStudentRequest extends SuperRequest
{
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['id_no'] = Helpers::convertToEnglish($input['id_no']);
        $input['hours_no'] = Helpers::convertToEnglish($input['hours_no']);
        $input['days_no'] = Helpers::convertToEnglish($input['days_no']);
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
            'name' => ['required'],
            'id_no' => ['nullable', 'integer'],
            'email' => ['nullable', 'email'],
            "title" => ["required"],
            "subtitle" => ["nullable"],
            "date_type" => ["required"],
            "start_date" => ["required", "date", "date_format:Y-m-d"],
            "end_date" => ["nullable", "date", "date_format:Y-m-d", "after:start_date"],
            "days_no" => ["required", "integer"],
            "hours_no" => ["required", "integer"],
        ];
    }
}
