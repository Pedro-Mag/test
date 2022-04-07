<?php

namespace App\Http\Requests\Main\Config;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MainDepartamentoRequest extends FormRequest
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
            'name' => ['sometimes','required', 'min:5', Rule::unique('clientes.main_departamentos')->ignore($this->id)],
            'descricao' => ['sometimes','string','max:1000'],
            'address' => ['sometimes','required','string','max:250'],
            'latitude' => ['sometimes','required','numeric'],
            'longitude' => ['sometimes','required','numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'designação do departamento',
            'descricao' => 'descrição do departamento',
            'address' => 'endereço',
        ];
    }
}
