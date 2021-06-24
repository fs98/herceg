<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'firstName' => [
              'required', 'max:128'
            ],
            'lastName' => [
              'required', 'max:128'
            ],
            'phoneNumber' => [
              'max:128'
            ],
            'email' => [
              'nullable', 'email:rfc,dns', 'max:128'
            ],
            'question' => [
              'required'
            ],
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Polje :attribute ne može biti prazno.',
            'max' => 'Polje :attribute može sadržavati najviše :max slovnih mjesta.',
            'email' => 'Polje :attribute mora biti validna email adresa.'
        ];
    }

    /**
     * Rename the validation attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'firstName' => 'ime',
            'lastName' => 'prezime',
            'phoneNumber' => 'broj telefona',
            'question' => 'poruka'
        ];
    }
}
