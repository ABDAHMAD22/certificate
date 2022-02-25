<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;

class SubscriptionRequest extends SuperRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "bank_id" => ["required", Rule::exists('banks', 'id')],
            "account_holder" => ["required"],
            "invoice" => ["required", 'file', 'max:4096', 'image'],
        ];
    }
}
