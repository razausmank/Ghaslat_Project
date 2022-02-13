<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'description' => 'required',
            'image' => ['nullable', 'image'],
            'price' => ['required', 'min:0'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'is_package' => 'required',
            'is_active' => 'nullable'
        ];
    }
}
