<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

/**
 * MobileNumberValidationRule rule class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class MobileNumberValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = "/(^([8]{2})?(01){1}[3-9]{1}\d{8})$/";
        if (!preg_match($regex, $value)) {
            $fail('invalid mobile number format')->translate();
        }
    }
}
