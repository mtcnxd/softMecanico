@extends('body')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <div class="col-md-12">
            <h3>Agenda</h3>
        </div>
        <div class="col-md-6">
            <span class="text-muted">Lista de eventos y servicios de mayo</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar Egreso</a>
        </div>
    </div>

    <div class="card shadow card-table border-start-0 col-md-12">
        <div class="col-md-12">
            <table class="table tbl-datatable table-hover" id="agendaTable">
                <thead>
                    <tr class="tbl-header">
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Evento</th>
                        <th>Cliente</th>
                        <th>Automovil</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ now()->format('d-m-Y') }}</td>
                        <td>Mantenimiento menor</td>
                        <td>Marcos Tzuc</td>
                        <td>Volkswagen Vento</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                <x-feathericon-eye style="height:20px"/>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>{{ now()->format('d-m-Y') }}</td>
                        <td>Mantenimiento mayor</td>
                        <td>Javier Rubio</td>
                        <td>Audi A3</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                <x-feathericon-eye style="height:20px"/>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>{{ now()->format('d-m-Y') }}</td>
                        <td>Mantenimiento mayor</td>
                        <td>Alejandra Lopez</td>
                        <td>Chevrolet S10</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                <x-feathericon-eye style="height:20px"/>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            @include('includes.modal')
        </div>
    </div>    
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
    $('#agendaTable').DataTable();
});
</script>
@endsection