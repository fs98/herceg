<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'tag_title' => 'required|min:1|max:16'
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
            'tag_title.required' => 'Ne možete sačuvati oznaku bez naziva.',
            'tag_title.min' => 'Oznaka mora biti duža od jednog slova.',
            'tag_title.max' => 'Oznaka mora biti kratka i sadržavati maksimalno 16 slova uključujući i razmake.'
        ];
    }
}
