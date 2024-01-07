<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'module_id' => 'required|exists:modules,code',
            'price' => 'required|numeric|max:50',
            'pages' => 'required|integer|max:1000',
        ];

        if ($this->isMethod('post')) {
            // Regles per a l'acció de creació (store)
            $rules['photo'] = 'required|image';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Regles per a l'acció d'actualització (update)
            $rules['photo'] = 'sometimes|image';
        }

        return $rules;
    }
}
