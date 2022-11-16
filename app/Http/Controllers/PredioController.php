<?php

namespace App\Http\Controllers;

use App\Models\Predio;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\PredioFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
//use Illuminate\Support\Facades\Redirect;
use DB;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inmobiliaria.predio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietarios = Persona::where('tipo_persona','Arrendador')->get();

        return view('inmobiliaria.predio.create',compact('propietarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PredioFormRequest $request)
    { 
        try {
            DB::beginTransaction();
            $predio = Predio::create([
                'nombre'           => strtoupper($request->nombre),
                'chip'             => strtoupper($request->chip),
                'matricula'        => strtoupper($request->matricula),
                'codigo_catastral' => $request->codigo_catastral,
                'direccion'        => strtoupper($request->direccion),
                'estrato'          => $request->estrato,
                'destino_catrastral'=> $request->destino_catrastral,
            ]);
            DB::commit();
            $predio->propietarios()->attach($request->propietario_id);
            Alert::success('¡Exito!', 'Inmueble creado correctamente');
            return redirect()->route('predio.create');
        } catch (\Throwable $e) {
            dd($e);
            DB::rollBack();
            Alert::error('Error', $e);
            return redirect()->route('predio.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function show(Predio $predio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function edit(Predio $predio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Predio $predio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predio  $predio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predio $predio)
    {
        //
    }
}
