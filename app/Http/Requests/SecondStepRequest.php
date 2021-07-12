<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecondStepRequest extends FormRequest
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
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'nullable|email:rfc,dns',
          'address' => 'required',
          'phone' => 'required',
          'city' => 'required',
          'zip' => 'required|max:8',
          'message' => 'nullable|max:300'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Ime ne smije ostati prazno.',
            'last_name.required' => 'Prezime ne smije ostati prazno.',
            'email' => 'Morate unijeti validnu email adresu.',
            'address.required' => 'Morate unijeti Vašu adresu.',
            'phone.required' => 'Morate unijeti broj telefona na koji Vas možemo kontaktirati.',
            'city.required' => 'Morate unijeti grad.',
            'zip.required' => 'Morate unijeti poštanski broj.',
            'zip.max' => 'Pošanski broj ne može biti duži od 8 znakova.',
            'message.max' => 'Poruka ne smije biti duža od 300 slovnih mjesta.'
        ];
    }
}
