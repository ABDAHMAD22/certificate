<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/14/2017
 * Time: 2:15 PM.
 */

namespace App\Traits;

/**
 * Trait StatusMethod.
 */
trait Translation
{
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();
        $hiddenAttributes = $this->getHidden();

        foreach ($this->translatable as $field) {
            if (in_array($field, $hiddenAttributes)) {
                continue;
            }

            if (isset($attributes[$field])) {
                $attributes[$field] = $attributes[$field][config('app.locale')] ?? $attributes[$field][config('app.fallback_locale')] ?? array_values($attributes[$field])[0];
            }
        }

        return $attributes;
    }
}
