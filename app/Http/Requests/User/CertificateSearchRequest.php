<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class CertificateSearchRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //"certificate" => ["required", Rule::exists('certificates', 'id')],
            "name" => ["required"]
        ];
    }
}
