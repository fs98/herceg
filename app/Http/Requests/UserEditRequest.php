<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'email' => 'required|email:rfc,dns',
          'password' => 'sometimes|nullable|min:8|confirmed',
          'password_confirmation' => 'sometimes'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
          'name.required' => 'Ime je obavezno.',
          'email.required' => 'Email je obavezan.',
          'email.unique' => 'Korisnik sa ovom adresom već postoji.',
          'email.email' => 'Ovo polje mora sadržavati validnu email adresu.',
          'password.required' => 'Morate upisati lozinku.',
          'password.min' => 'Lozinka ne smije biti kraća od 8 karaktera.',
          'password.confirmed' => 'Lozinke se ne poklapaju.',
        ];
    }
}
