<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'text' => 'sometimes|required|min:5',
            'name' => [
                'sometimes',
                'required',
                'regex:/^\S*$/u',
                'min:5',
                Rule::unique('modules')->ignore($this->id)
            ],
            'icon' => 'sometimes|nullable|min:3',
            'url' => 'sometimes|nullable|regex:/^\S*$/u|min:5',
            'parent_id' => 'sometimes|nullable|exists:modules,id',
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'designação do módulo',
            'name' => 'permissão associada',
        ];
    }
}
