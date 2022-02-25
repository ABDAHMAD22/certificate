<?php

namespace App\Http\Requests\User;

use App\Classes\Helpers;
use Illuminate\Validation\Rule;

class UserProfileRequest extends SuperRequest
{
    protected function prepareForValidation()
    {
        $input = $this->all();
        $input['mobile'] = Helpers::convertToEnglish($input['mobile']);
        $input['account_manager_mobile'] = Helpers::convertToEnglish($input['account_manager_mobile']);
        $this->replace($input);
        return $this->all();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = \Auth::user();
        $id = $user->id;
        return [
            "name" => ["required", Rule::unique('users')->ignore($id)],
            "email" => ["nullable", "email", Rule::unique('users')->ignore($id)],
            "mobile" => ["required", 'numeric', 'digits_between:10,15', Rule::unique('users')->ignore($id)],
            "name_en" => ["nullable"],
            'image' => [!$user->image?'required':'nullable', 'file', 'max:2048', 'image'],
            "country_id" => ["required", Rule::exists('countries', 'id')],
            "city_id" => ["required", Rule::exists('cities', 'id')],
            "region" => ["required"],
            "manager_name" => ["required"],
            "training_licence" => [!$user->training_licence?'required':'nullable', 'file', 'max:4096', 'image'],
            "commercial_register" => [!$user->commercial_register?'required':'nullable','file', 'max:4096', 'image'],
            "training_licence_no" => ["required"],
            "commercial_register_no" => ["required"],
            "account_manager" => ["required"],
            "account_manager_mobile" => ["required", 'numeric', 'digits_between:10,15', Rule::unique('users')->ignore($id)],
            "account_manager_email" => ["required", "email", Rule::unique('users')->ignore($id)],
            'social_links' => ['nullable', 'array'],
            'social_links.website' => ['nullable'],
            'social_links.twitter' => ['nullable'],
            'social_links.instagram' => ['nullable'],
            'social_links.snapchat' => ['nullable'],
        ];
    }
}
