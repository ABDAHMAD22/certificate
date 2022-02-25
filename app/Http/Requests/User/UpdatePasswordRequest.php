<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "password" => ["required", "min:6", "confirmed"],
        ];
    }
}
