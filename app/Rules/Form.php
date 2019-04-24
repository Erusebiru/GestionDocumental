<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Form implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //
    }

    public function rules(){
        return [
            'Nombre' => 'required',
            'Email' => 'required|email',
            'NIF_CIF' => 'required',
            'Telefono' => 'required|digits:9',
            'Direccion' => 'required',
            'Localidad' => 'required',
            'CP' => 'required|digits:5',
            'Provincia' => 'required',
        ]
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
