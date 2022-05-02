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
        $unless = "change_status";

		switch ($this->method()) {
		case 'POST':
			return [
				'name' => 'required|min:3',
				'price' => 'required|numeric',
                'category_id' => 'required',
                // 'image' => 'required|mimes:jpeg,jpg,png',
			];
			break;
		case 'PUT':
			return [
				'name' => 'required_unless:action,' . $unless . '|min:3',
                'price' => 'required_unless:action,' . $unless . '|numeric',
				// 'image' => 'nullable|mimes:jpeg,jpg,png',
				
			];
			break;
		}
    }

    public function messages()
    {
        return [
          
            'category_id.required' => 'The category field is required.',
            
        ];
    }
}
