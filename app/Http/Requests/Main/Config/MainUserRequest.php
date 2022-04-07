<?php

namespace App\Http\Requests\Main\Config;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class MainUserRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'regex:/(.+ .+)\w+/i'],
            'email' => ['required','email', Rule::unique('clientes.main_users')->ignore($this->id)],
            'rgpd' => ['boolean'],
            'gestor' => ['boolean'],
            'main_user_group_id' => ['sometimes','required','exists:clientes.main_user_groups,id'],
            'main_departamentos' => ['sometimes','required','array', 'min:1'],
            'main_departamentos.*' => ['sometimes','required','integer', 'numeric','exists:clientes.main_departamentos,id'],
            'password' => ['sometimes','nullable','confirmed', Password::min(8)->numbers()->mixedCase()],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome do utilizador',
            'email' => 'endereço de correio electrónico',
            'main_user_group_id' => 'grupo de utilizador',
            'main_departamentos' => 'permissão por departamentos',
        ];
    }
}
