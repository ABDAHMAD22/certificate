<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class ResetPasswordRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $type = $this->segment(1) == 'user' ? 'users' : 'editors';
        return [
            "email" => ["required", "email", Rule::exists($type)],
        ];
    }
}
