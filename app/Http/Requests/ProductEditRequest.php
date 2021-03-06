<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
          'title' => 'required',
          'category' => 'required',
          'price' => 'required|integer|min:0',
          'product_description' => 'required',
          'product_ingredients' => 'required',
          'selected_image' => 'image|mimes:jpg,jpeg,png|max:16384'
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
            'title.required' => 'Naziv je obavezan.',
            'category.required' => 'Morate odabrati kategoriju.',
            'price.required' => 'Morate definisati cijenu.',
            'price.min' => 'Cijena ne može biti manja od nule.',
            'product_description.required' => 'Opis proizvoda je obavezan.',
            'product_ingredients.required' => 'Morate unijeti sastav proizvoda.',
            'selected_image.image' => 'Kao fotografiju nije dozvoljeno postaviti druge vrste fajlova',
            'selected_image.mimes' => 'Dozvoljeni formati su: jpg, jpeg, png',
            'selected_image.max' => 'Maksimalna dozvoljena veličina fotografije je 16MB.',
        ];
    }
}
