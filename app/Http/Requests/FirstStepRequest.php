<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstStepRequest extends FormRequest
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
            'shippingType' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required'
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
            'required' => 'Morate odabrati :attribute.'
        ];
    }

    /**
     * Get the attribute names.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'shippingType' => 'način isporuke',
            'fromDate' => 'datum od kojeg možete preuzeti isporuku',
            'toDate' => 'datum do kojeg možete preuzeti isporuku'
        ];
    }
    
}
