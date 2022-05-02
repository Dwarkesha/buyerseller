<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ProfileRequest extends FormRequest
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
            'full_name'        =>  'required|max:50',
            'email'             =>  'required|max:150',
            'contact_no'        =>  'required|min:6|max:14',
            'address'         =>  'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'The Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'Enter valid Email address field.',
            'contact_no.required' => 'The Contact Number field is required.',
            'address.required' => 'The Address field is required.',
            'password.required' => 'The Password field is required.',
        ];
    }
}
