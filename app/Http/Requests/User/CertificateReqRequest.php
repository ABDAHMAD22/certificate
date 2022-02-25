<?php

namespace App\Http\Requests\User;

use App\Classes\Helpers;
use Illuminate\Validation\Rule;

class CertificateReqRequest extends SuperRequest
{
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['hours_no'] = Helpers::convertToEnglish($input['hours_no']);
        $input['days_no'] = Helpers::convertToEnglish($input['days_no']);
        $input['accreditation_no'] = Helpers::convertToEnglish($input['accreditation_no']);
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
            "template_id" => ["required", Rule::exists('templates', 'id')],
            //"type" => ["required"],
            "certificate_type_id" => ["required", Rule::exists('certificate_types', 'id')],
            "language_id" => ["required", Rule::exists('languages', 'id')],
            "accreditation_no" => ["nullable", "integer"],
            "title" => ["required"],
            "subtitle" => ["nullable"],
            "date_type" => ["required"],
            "start_date" => ["required", "date", "date_format:Y-m-d"],
            "end_date" => ["nullable", "date", "date_format:Y-m-d", "after:start_date"],
            "days_no" => ["required", "integer"],
            "hours_no" => ["required", "integer"],
            "trainer_name" => ["nullable"],
            //"font_id" => ["required", Rule::exists('fonts', 'id')],
            //"name" => ["required", Rule::unique('users')],
            //"email" => ["required", "email", Rule::unique('users')],
        ];
    }
}
