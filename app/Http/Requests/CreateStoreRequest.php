<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
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
            'address' => 'required',
        ];
    }

    /**
     * Validation messages
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name store is required.',
            'address.required' => 'The address store is required.',
        ];
    }
}
