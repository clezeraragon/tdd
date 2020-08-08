<?php

namespace App\Http\Requests\Pathology;

use Illuminate\Foundation\Http\FormRequest;

class PathologyUpdateRequest extends FormRequest
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
            'title' => "required|unique:pathologies,title,{$this->get('id')}",
            'gravity' => 'required',
            'cured' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "O campo name é obrigatório!",
            'title.unique' => "Este title já se encontra em nossa base!",
            'gravity.required' => "O campo gravity é obrigatório!",
            'cured.required' => "O campo cured é obrigatório!",
        ];
    }
}
