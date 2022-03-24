<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class maxCharacters implements Rule
{
    protected $max;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($max = 50)
    {
        $this->max = $max;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen(preg_replace('/\s+/', ' ', $value)) <= $this->max;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Karakter yang dimasukan tidak boleh lebih besar dari {$this->max}.";
    }
}
