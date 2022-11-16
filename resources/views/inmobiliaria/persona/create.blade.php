@extends('layouts.app')
@section('title', 'Crear Nuevo Propietario')
@section('text', 'A continuación encontrará un formulario, por favor diligenciar.')
@section('contenido')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Datos Básicos Propietario</h5>
            </div>
            
            <div class="card-block">
                <form class="form-material" id="crearPersona" action="{{ route('persona.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group form-floating">
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                        <label class="float-label">Nombre</label>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido') }}">
                        <label class="float-label">Apellido</label>
                        @error('apellido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <select name="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror">
                            <option>Seleccione tipo de documento</option>
                            <option value="C.C" @if (old('tipo_documento') == "C.C") {{ 'selected' }} @endif>C.C</option>
                            <option value="C.E" @if (old('tipo_documento') == "C.E") {{ 'selected' }} @endif>C.E</option>
                            <option value="NIT" @if (old('tipo_documento') == "NIT") {{ 'selected' }} @endif>NIT</option>
                            <option value="T.I" @if (old('tipo_documento') == "T.I") {{ 'selected' }} @endif>T.I</option>
                        </select>
                        @error('tipo_documento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="numero_documento" class="form-control @error('numero_documento') is-invalid @enderror" maxlength="10" value="{{ old('numero_documento') }}">
                        <label class="float-label">Número de documento</label>
                        @error('numero_documento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        <label class="float-label">Email (exa@gmail.com)</label>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}">
                        <label class="float-label">Dirección</label>
                        @error('direccion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{ old('celular') }}">
                        <label class="float-label">Número de celular</label>
                        @error('celular')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                        <input type="hidden" name="tipo_persona" value="1">
                        <button type="submit" class="btn btn-primary"><i class="icofont icofont-user-alt-3"></i>Guardar</button>
                </form>
            </div>
        </div>
    </div>
@stop
