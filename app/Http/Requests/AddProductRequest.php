<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'mimes:jpg,jpeg,png|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name is required.',
            'price.required' => 'Product Price is required.',
            'quantity.required' => 'Product Quantity is required.',
            'image.required' => 'Product Image is required.'
        ];
    }
}
