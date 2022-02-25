<?php

namespace App\Http\Requests\User;

use App\Classes\Helpers;
use Illuminate\Validation\Rule;

class ContactRequest extends SuperRequest
{
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['mobile'] = Helpers::convertToEnglish($input['mobile']);
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
            "name" => ["required"],
            "email" => ["required", "email"],
            "mobile" => ["required", 'numeric', 'digits_between:10,15'],
            "message" => ["required"],
        ];
    }
}
