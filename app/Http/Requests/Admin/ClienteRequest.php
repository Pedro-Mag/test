<?php

namespace App\Http\Requests\Admin;

use App\Rules\PhoneNumber;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'name' => ['required', 'min:3', Rule::unique('admin_clientes')->ignore($this->id)],
            'account' => ['sometimes', 'required', 'min:3', 'regex:/^[a-zA-Z0-9-]+$/u', Rule::unique('admin_clientes')->ignore($this->id)],
            'designacao' => ['required', 'string','min:8', Rule::unique('admin_clientes')->ignore($this->id)],
            'contact' => ['required', new PhoneNumber],
            'email' => 'required|email|unique:admin_users',
            'address' => 'required|min:15',
            'latitude' => 'required',
            'longitude' => 'required',
            'nif' => ['sometimes', 'required','digits:9', Rule::unique('admin_clientes')->ignore($this->id)],
            'admin_user_id' => 'sometimes|required|exists:admin_users,id',
            'status' => 'sometimes|boolean',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'designação comercial do cliente',
            'account' => 'designação da conta do cliente',
            'designacao' => 'designação comercial completa do cliente',
            'contact' => 'contacto telefónico',
            'email' => 'endereço de email',
            'address' => 'endereço',
            'admin_user_id' => 'gestor de conta',
        ];
    }
}
