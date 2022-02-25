<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class EditorProfileRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $editor = \Auth::guard('editor')->user();
        $id = $editor->id;
        return [
            "name" => ["required", Rule::unique('editors')->ignore($id)],
            "email" => ["nullable", "email", Rule::unique('editors')->ignore($id)],
            'image' => [!$editor->image?'required':'nullable', 'file', 'max:2048', 'image'],
        ];
    }
}
