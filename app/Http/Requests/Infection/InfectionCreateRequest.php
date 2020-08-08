<?php

namespace App\Http\Requests\Infection;

use Illuminate\Foundation\Http\FormRequest;

class InfectionCreateRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'title' => 'required|unique:pathologies',
            'gravity' => 'required',
            'cured' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "O campo name é obrigatório!",
            'email.required' => "O campo email é obrigatório!",
            'email.unique' => "Este email já se encontra em nossa base!",
            'title.required' => "O campo title é obrigatório!",
            'title.unique' => "Esta patologia já existe em nossa base!",
            'gravity.required' => "O campo gravity é obrigatório!",
            'cured.required' => "O campo cured é obrigatório!",
        ];
    }
}
