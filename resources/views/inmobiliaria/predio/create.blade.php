@extends('layouts.app')
@section('title', 'Crear Nuevo Predio')
@section('text', 'A continuación encontrará un formulario, por favor diligenciar.')
@section('contenido')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Datos Básicos Inmueble</h5>
            </div>
            <div class="card-block">
                <form class="form-material" id="crearPredio" action="{{ route('predio.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group form-floating">
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                        <label class="float-label">Nombre</label>
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="chip" class="form-control @error('chip') is-invalid @enderror" value="{{ old('chip') }}">
                        <label class="float-label">Chip (AAA-0000-ABCD)</label>
                        @error('chip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror" maxlength="15" value="{{ old('matricula') }}">
                        <label class="float-label">Matrícula Inmobiliaria</label>
                        @error('matricula')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="codigo_catastral" class="form-control @error('codigo_catastral') is-invalid @enderror" value="{{ old('codigo_catastral') }}">
                        <label class="float-label">Código Catastral</label>
                        @error('codigo_catastral')
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
                        <input type="number" name="estrato" class="form-control @error('estrato') is-invalid @enderror" value="{{ old('estrato') }}">
                        <label class="float-label">Estrato</label>
                        @error('estrato')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="destino_catrastral" class="form-control @error('destino_catrastral') is-invalid @enderror" value="{{ old('destino_catrastral') }}">
                        <label class="float-label">Destino Catastral</label>
                        @error('destino_catrastral')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row d-flex justify-content-center mt-100">
                        <div class="col-md-12 pb-2"> 
                            <select id="choices-multiple-remove-button" name="propietario_id[]" placeholder="Seleccione propietario(s) max 5" multiple>
                                @foreach ($propietarios as $propietario)
                                    <option value="{{ $propietario->id }}"  {{ collect(old('propietario_id'))->contains($propietario->id) ? 'selected':'' }}>{{ $propietario->nombre.' '.$propietario->apellido }}</option>
                                @endforeach
                            </select> 
                            @error('propietario_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary"><i class="ti-home"></i>Guardar</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount:5,
                searchResultLimit:5,
                renderChoiceLimit:5
            });
        });
    </script>
@endsection
