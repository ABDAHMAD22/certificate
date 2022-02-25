<?php

namespace App\Http\Requests\User;

use App\Traits\UsesCustomErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class SuperRequest extends FormRequest
{
    use UsesCustomErrorMessage;
    /**
     * Get the validation message that applies to the request.
     *
     * @return string
     */
    public function message()
    {
        return trans('app.given_data_invalid');
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
