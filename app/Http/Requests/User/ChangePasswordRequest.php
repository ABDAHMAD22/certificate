<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class ChangePasswordRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $currentPassword = null;
        if(\Auth::guard('web')->check()) {
            $currentPassword = \Auth::guard('web')->user()->password;
        }
        if(\Auth::guard('editor')->check()) {
            $currentPassword = \Auth::guard('editor')->user()->password;
        }
        return [
            'current_password' => ['required', function ($attribute, $value, $fail) use($currentPassword) {
                if (!\Hash::check($value, $currentPassword)) {
                    return $fail(__('app.current_password_is_incorrect'));
                }
            }],
            "password" => ["required", "min:6", "confirmed"],
        ];
    }
}
