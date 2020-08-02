<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "O campo name é obrigatório!",
            'email.required' => "O campo email é obrigatório!",
            'email.email' => "O campo email é inválido!",
            'password.required' => "O campo password é obrigatório!",
        ];
    }
}
