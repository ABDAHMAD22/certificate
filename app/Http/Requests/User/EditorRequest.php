<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class EditorRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", Rule::unique('editors')],
            "email" => ["required", "email", Rule::unique('editors')],
            'image' => ['nullable', 'file', 'max:2048', 'image'],
            'permits' => ['required', 'array'],
        ];
    }
}
