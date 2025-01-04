<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var int $value */
        $valid_start_year = 1980;

        $valid_end_year = now()->format('Y');

        if ($value < $valid_start_year || $value > $valid_end_year) {
            $fail('التاريخ يجيب أن يكون بين 1980 والسنة الحالية');
        }

    }
}
