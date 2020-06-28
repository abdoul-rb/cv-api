<?php

namespace App\Http\Requests\Achieve;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchieveFormRequest extends FormRequest
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
            'url' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nom obligatoire.',
            'url.required' => 'URL obligatoire.',
            'description.required' => 'Description obligatoire.',
        ];
    }
}
