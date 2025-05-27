<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements Rule
{

    public function __construct()
    {
        //
    }
    
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value){

        $response = Http::get("https://www.google.com/recaptcha/api/siteverify",[

            'secret' => env('CAPTCHA_SECRET'),

            'response' => $value

        ]);

          

        return $response->json()["success"];

    }

    /**
     * Get the validation error message.
     */
    public function message()
    {
        return 'The Google ReCaptcha is required.';
    }
}