<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserFormRequest extends FormRequest
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
        'name'=>'required|string',
        'phone' => 'required|min:11|numeric',
        'email'=>'required|string|email|unique:users',
        'password'=>'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8'
      ];

    }
    
}
