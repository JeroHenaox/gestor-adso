<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $aprendiz = $this->route('aprendice');

        $id = $aprendiz instanceof \App\Models\Aprendiz
            ? $aprendiz->id
            : $aprendiz;

        return [
            'nombre' => [
                'required',
                'string',
                'max:120',
            ],

            'documento' => [
                'required',
                'string',
                'max:40',
                Rule::unique('aprendices', 'documento')->ignore($id),
            ],

            'correo' => [
                'required',
                'email',
                'max:120',
                Rule::unique('aprendices', 'correo')->ignore($id),
            ],

            'ficha_id' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar los 120 caracteres.',

            'documento.required' => 'El documento es obligatorio.',
            'documento.max' => 'El documento no puede superar los 40 caracteres.',
            'documento.unique' => 'Este documento ya está registrado.',

            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'Debes ingresar un correo electrónico válido.',
            'correo.max' => 'El correo no puede superar los 120 caracteres.',
            'correo.unique' => 'Este correo ya está registrado.',

            'ficha_id.integer' => 'La ficha debe ser un número entero.',
        ];
    }
}
