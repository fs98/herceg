<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_title' => 'required',
            'selected_image' => 'required|image|mimes:jpg,jpeg,png|max:16384'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_title.required' => 'Morate unijeti naziv kategorije',
            'selected_image.required' => 'Kategorija mora imati sliku',
            'selected_image.image' => 'Molimo izaberite sliku!',
            'selected_image.mimes' => 'Izabrana slika mora biti u jednom od sljedećih formata: jpeg, jpg, png.',
            'selected_image.max' => 'Maksimalna dozvoljena veličina slike je 16MB.'

        ];
    }
}
