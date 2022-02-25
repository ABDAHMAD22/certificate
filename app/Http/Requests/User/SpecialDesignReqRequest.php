<?php

namespace App\Http\Requests\User;

class SpecialDesignReqRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "services" => ['required', 'array']
        ];
    }
}
