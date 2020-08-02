<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => "required|email|unique:users,email,{$this->get('id')}",
            'password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "O campo name é obrigatório!",
            'email.required' => "O campo email é obrigatório!",
            'email.email' => "O campo email é inválido!",
            'email.unique' => "Este email já se encontra em nossa base!",
            'password.required' => "O campo password é obrigatório!",
        ];
    }
}
