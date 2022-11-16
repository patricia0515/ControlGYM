<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PredioFormRequest extends FormRequest
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
            'nombre'           => 'required',
            'chip'             => ['required','unique:predios,chip'],
            'matricula'        => ['required','unique:predios,matricula'],
            'direccion'        => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nombre'           => 'Nombre',
            'chip'             => 'Chip',
            'matricula'        => 'Matrícula Inmobiliaria',
            'direccion'        => 'Dirección',
        ];
    }

    public function messages()
    {
        return [
            'chip.unique'          => 'El :attribute ya esta registrado.',
            'chip.required'        => 'El :attribute es obligatorio',
            'matricula.required'   => 'La :attribute es obligatoria',
            'matricula.unique'     => 'La :attribute ya esta registrada',
            'nombre.required'      => 'El :attribute de referencia es obligatorio',
            'direccion.required'   => 'La :attribute es obligatoria',
        ];
    }
}
