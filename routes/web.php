<?php

use Illuminate\Support\Facades\Route;
use App\Models\Predio;
use App\Models\Persona;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\ServicioPublicoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/inmobiliaria/persona',PersonaController::class);
//http://127.0.0.1:8000/inmobiliaria/persona/create

Route::resource('predio',PredioController::class);
//http://127.0.0.1:8000/predio/create

Route::resource('servicio',ServicioPublicoController::class);
//http://127.0.0.1:8000/servicio/create

Route::get('propietarios',function (){
    return datatables()->of(Persona::query())->toJson();
});
Route::get('predios',function (){
    return datatables()->of(Predio::query())->toJson();
});
