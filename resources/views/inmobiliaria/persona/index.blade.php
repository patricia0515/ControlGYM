@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    
@endsection
@section('title', 'Lista de Propietarios/Arrendador(es)')
@section('text', 'Si desea visualizar un registro en concreto porfavor seleccione.')
@section('contenido')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Basic table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Propietarios</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="propietarios" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Número documento</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Basic table card end -->
                    
                    
                    
                    <!-- Background Utilities table start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Background Utilities</h5>
                            <span>Regular table background variants are not available with the inverse table, however, you may  <code>text or background utilities</code> to achieve similar styles.</span>
                        </div>
                    </div>
                    <!-- Background Utilities table end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>
        <!-- Main-body end -->
    </div>
@stop
@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>    
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    

    <script>
        $(document).ready(function() {
            $('#propietarios').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                "pagingType": "full_numbers",
                "ajax": "{{ url('propietarios') }}",
                "columns": [
                    {"data": "id"},
                    {"data": "nombre"}, 
                    {"data": "apellido"},
                    {"data": "numero_documento"},
                ]
            });
        });
    </script>

@endsection