<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioFormRequest extends FormRequest
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
            'empresa'          => 'required',
            'cuenta_contrato'  => ['required','unique:servicio_publicos,cuenta_contrato'],
            'predio_id'        => 'required',
            'clase_uso'        => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'empresa'          => 'Empresa prestadora de servicio',
            'cuenta_contrato'  => 'Cuenta contrato',
            'predio_id'        => 'Inmueble',
            'clase_uso'        => 'Clase de Uso',
        ];
    }

    public function messages()
    {
        return [
            'empresa.required'         => 'La :attribute es obligatoria',
            'cuenta_contrato.required' => 'El número de :attribute es obligatorio',
            'cuenta_contrato.unique'   => 'La :attribute ya esta registrada.',
            'predio_id.required'       => 'El nombre del :attribute es obligatorio',
            'clase_uso.required'       => 'La :attribute es obligatorio',
        ];
    }
}
