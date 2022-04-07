<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MainEventsMessageRequest extends FormRequest
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
            'message' => ['required', 'string', 'min:10', Rule::unique('main_events_messages')->ignore($this->id)],
            'model' => ['nullable', 'string', 'min:3', 'regex:/^[a-zA-Z0-9\\\\]+$/u'],
            'name' => ['nullable', 'string', 'min:3', 'regex:/^[a-zA-Z0-9]+$/u'],
            'href' => ['nullable', 'string', 'min:3', 'regex:/^[a-zA-Z0-9\/]+$/u'],
            'reference' => ['nullable', 'string', 'min:3', 'regex:/^[a-zA-Z0-9]+$/u'],

        ];
    }

    public function attributes()
    {
        return [
            'message' => 'mensagem do evento',
            'model' => 'modelo',
            'name' => 'referência no modelo',
            'href' => 'ligação',
            'reference' => 'referência da ligação',
        ];
    }
}
