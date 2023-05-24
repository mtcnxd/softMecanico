@extends('body')

@section('content')
    <div class="col-md-12 pt-4 mb-4 agenda-content">
        <h3>Clientes</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col text-end">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar cliente</a>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <table class="table table-striped" id="clients">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Colonia</th>
                    <th>Codigo Postal</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            @foreach ($clients as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td><a href="{{ route('clients.show', $c) }}">{{ $c->client_firstname }} {{ $c->client_lastname }}</a></td>
                    <td>{{ $c->client_address }}</td>
                    <td>{{ $c->colonia }}</td>
                    <td>{{ $c->client_postalcode }}</td>
                    <td><a href="#">{{ $c->client_email }}</a></td>
                    <td>{{ $c->client_phone }}</td>
                    <td class="text-end">
                        <form action="{{ route('clients.destroy', $c) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn-icon">
                                <x-feathericon-trash-2 style="height:19px"/>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#clients').DataTable({
            "pageLength": 20,
            "lengthMenu": [20, 40, 80, 100],
            "columnDefs": [{ 
                orderable: false, 
                targets: [2,4,5] 
            }]
        });
    });
    </script>
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection