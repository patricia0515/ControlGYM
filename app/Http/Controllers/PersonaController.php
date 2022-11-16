<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
//use Illuminate\Support\Facades\Redirect;
use DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliaria.persona.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inmobiliaria.persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $client = Persona::create([
                'nombre' => strtoupper($request->nombre),
                'apellido' => strtoupper($request->apellido),
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'celular' => $request->celular,
                'email' => $request->email,
                'direccion' => $request->direccion,
                'tipo_persona' => $request->tipo_persona == 0 ? 'Arrendatario' : 'Arrendador' 
            ]);
            DB::commit();
            Alert::success('¡Exito!', 'Propietario creado correctamente');
            return redirect()->route('persona.index');
        } catch (\Throwable $e) {
            DB::rollBack();
            Alert::error('Error', $e);
            return redirect()->route('persona.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('inmobiliaria.persona.show',["Persona"=>Persona::findOrfail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return view('inmobiliaria.persona.edit',["Persona"=>Persona::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
