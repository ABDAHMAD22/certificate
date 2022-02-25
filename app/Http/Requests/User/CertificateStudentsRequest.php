<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class CertificateStudentsRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => [!$this->students?'required':'nullable', 'file', 'mimes:xls,xlsx'],// Rule::requiredIf(!$this->students)
            'students' => ['nullable', 'array'],
            'students.*' => ['required'],
            'students.*.name' => ['required'],
            'students.*.id_no' => ['nullable'],
            'students.*.email' => ['nullable'],
        ];
    }
}
