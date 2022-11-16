@extends('layouts.app')
@section('title', 'Nueva Cuenta Contrato')
@section('text', 'A continuación encontrará un formulario, por favor diligenciar.')
@section('contenido')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Datos Factura</h5>
            </div>
            
            <div class="card-block">
                <form class="form-material" id="crearServicio" action="{{ route('servicio.store') }}" method="POST">
                    @csrf
                    <div class="form-group form-floating">
                        <select name="empresa" class="form-control @error('empresa') is-invalid @enderror">
                            <option disabled selected>Seleccione tipo servicio</option>
                            <option value="Acueducto" @if (old('empresa') == "Acueducto") {{ 'selected' }} @endif>Acueducto</option>
                            <option value="Codensa" @if (old('empresa') == "Codensa") {{ 'selected' }} @endif>Codensa</option>
                            <option value="Vanti" @if (old('empresa') == "Vanti") {{ 'selected' }} @endif>Vanti</option>
                        </select>
                        @error('empresa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="cuenta_contrato" class="form-control @error('cuenta_contrato') is-invalid @enderror" maxlength="10" value="{{ old('cuenta_contrato') }}">
                        <label class="float-label">Número cuenta contrato</label>
                        @error('cuenta_contrato')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="medidor" class="form-control @error('medidor') is-invalid @enderror" maxlength="30" value="{{ old('medidor') }}">
                        <label class="float-label">Número medidor</label>
                        @error('medidor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="ruta" class="form-control @error('ruta') is-invalid @enderror" maxlength="30" value="{{ old('ruta') }}">
                        <label class="float-label">Número ruta</label>
                        @error('ruta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" name="clase_uso" class="form-control @error('clase_uso') is-invalid @enderror" maxlength="20" value="{{ old('clase_uso') }}">
                        <label class="float-label">Clase de Uso</label>
                        @error('clase_uso')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="row d-flex justify-content-center mt-100">
                        <div class="col-md-12 pb-3"> 
                            <select id="choices-remove-button" name="predio_id" placeholder="Seleccione Inmueble" multiple>
                                @foreach ($predios as $predio)
                                    <option value="{{ $predio->id }}"  {{ collect(old('predio_id'))->contains($predio->id) ? 'selected':'' }}>{{ $predio->nombre.' '.$predio->apellido }}</option>
                                @endforeach
                            </select> 
                            @error('propietario_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-floating">
                        <input type="text" class="form-control @error('referencia') is-invalid @enderror" name="referencia" value="{{ old('referencia') }}">
                        <label class="float-label">Referencia</label>
                        @error('referencia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group form-floating">
                        <input type="number" name="fecha_estimada_pago" class="form-control @error('fecha_estimada_pago') is-invalid @enderror" maxlength="10" value="{{ old('fecha_estimada_pago') }}">
                        <label class="float-label">Fecha Estimada Pago</label>
                        @error('fecha_estimada_pago')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="icofont icofont-user-alt-3"></i>Guardar</button>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            var CancelButton = new Choices('#choices-remove-button', {
                removeItemButton: true,
                maxItemCount:1,
                searchResultLimit:3,
                renderChoiceLimit:3
            });
        });
    </script>
@endsection