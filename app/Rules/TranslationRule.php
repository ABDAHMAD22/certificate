<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class TranslationRule implements Rule
{

    private $attribute;
    private $lang;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;

        foreach (config('translatable.locales') as $key => $lang) {
            if (!Arr::get($value, $key)) {
                $this->lang = $lang;
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.required_lang', ['attribute' => $this->attribute, 'lang' => strtolower($this->lang)]);
    }
}
