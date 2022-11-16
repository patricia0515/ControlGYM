<?php

namespace App\Http\Controllers;

use App\Models\ServicioPublico;
use App\Models\Predio;
use Illuminate\Http\Request;
use App\Http\Requests\ServicioFormRequest;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use DB;


class ServicioPublicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $predios = Predio::all();
        return view('inmobiliaria.servicio.create',compact('predios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioFormRequest $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();
            $servicio = ServicioPublico::create([
                'empresa'            => $request->empresa,
                'cuenta_contrato'    => trim($request->cuenta_contrato),
                'medidor'            => strtoupper($request->medidor) ?: null ,
                'ruta'               => strtoupper($request->ruta) ?: null,
                'clase_uso'          => strtoupper($request->clase_uso) ?: null,
                'referencia'         => strtoupper($request->referencia)?: null,
                'fecha_estimada_pago'=> $request->fecha_estimada_pago ?: null,
                'predio_id'          => $request->predio_id,
            ]);
            DB::commit();
            //$predio->propietarios()->attach($request->propietario_id);
            Alert::success('¡Exito!', 'Cuenta contrato creada correctamente');
            return redirect()->route('servicio.create');
        } catch (\Throwable $e) {
            dd($e);
            DB::rollBack();
            Alert::error('Error', $e);
            return redirect()->route('servicio.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServicioPublico  $servicioPublico
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioPublico $servicioPublico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServicioPublico  $servicioPublico
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicioPublico $servicioPublico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServicioPublico  $servicioPublico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicioPublico $servicioPublico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServicioPublico  $servicioPublico
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicioPublico $servicioPublico)
    {
        //
    }
}
