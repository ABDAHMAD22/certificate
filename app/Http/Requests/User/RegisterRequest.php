<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class RegisterRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", Rule::unique('users')],
            "email" => ["required", "email", Rule::unique('users')],
            "password" => ["required", "min:6", "confirmed"],
            "terms_of_use" => ["required"],
        ];
    }
}
