<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'nombre'           => 'required|max:25',
            'apellido'         => 'max:25',
            'tipo_documento'   => 'required|max:10',
            'numero_documento' => ['required','unique:personas,numero_documento'],
            'celular'          => 'required|integer',
            'email'            => ['required','email:rfc,dns','unique:personas,email'],
            'direccion'        => 'required|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'nombre'           => 'Nombre',
            'apellido'         => 'Apellido',
            'tipo_documento'   => 'Tipo de documento',
            'numero_documento' => 'Número de documento',
            'email'            => 'Correo electrónico',
            'celular'          => 'Teléfono',
            'direccion'        => 'Dirección',

        ];
    }

    public function messages()
    {
        return [
            'email.email'               => 'Ingrese un :attribute valido',
            'email.unique'              => 'El :attribute ya esta registrado.',
            'email.required'            => 'El :attribute es obligatorio',
            'tipo_documento.required'   => 'El :attribute es obligatorio',
            'numero_documento.required' => 'El :attribute es obligatorio',
            'numero_documento.unique'   => 'El :attribute ya esta registrado.',
            'nombre.required'           => 'El :attribute es obligatorio',
            'celular.required'          => 'El :attribute es obligatorio',
            'direccion.required'        => 'La :attribute es obligatoria',
        ];
    }
}
