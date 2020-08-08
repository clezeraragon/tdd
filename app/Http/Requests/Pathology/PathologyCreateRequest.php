<?php

namespace App\Http\Requests\Pathology;

use Illuminate\Foundation\Http\FormRequest;

class PathologyCreateRequest extends FormRequest
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
            'title' => 'required',
            'gravity' => 'required',
            'cured' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "O campo title é obrigatório!",
            'gravity.required' => "O campo gravity é obrigatório!",
            'cured.required' => "O campo cured é obrigatório!",
        ];
    }
}
