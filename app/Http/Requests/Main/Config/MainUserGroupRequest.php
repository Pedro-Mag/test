<?php

namespace App\Http\Requests\Main\Config;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MainUserGroupRequest extends FormRequest
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
            'name' => ['required', 'min:3', Rule::unique('clientes.main_user_groups')->ignore($this->id)],
            'descricao' => ['required','min:8'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'designação do grupo',
            'descricao' => 'descrição',
        ];
    }
}
