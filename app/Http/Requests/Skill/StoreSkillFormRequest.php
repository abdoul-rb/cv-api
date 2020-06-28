<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillFormRequest extends FormRequest
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
            'name' => 'required|unique:skills',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nommer votre compétence !!!',
            'category.required' => 'À quelle catégorie appartient-elle ?'
        ];
    }
}
