<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class LoginRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => ["required", "email"],
            "password" => ["required"]
        ];
    }
}
