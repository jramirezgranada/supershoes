<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
            'price' => 'required|numeric',
            'total_in_shelf' => 'required|integer',
            'total_in_vault' => 'required|integer',
            'store_id' => 'required|integer|exists:stores,id'
        ];
    }

    /**
     * Validation messages
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name article is required.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The prices must be numeric.',
            'total_in_shelf.required' => 'Total in shelf is required.',
            'total_in_shelf.integer' => 'Total in shelf must be an integer value.',
            'total_in_valut.required' => 'Total in vault is required.',
            'total_in_valut.integer' => 'Total in vault must be an integer value.',
            'store_id.integer' => 'Store ID must be an integer value.',
            'store_id.required' => 'Store ID is required',
            'store_id.exists' => 'Store does not exists in database.',
        ];
    }
}
