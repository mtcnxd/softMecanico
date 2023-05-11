@extends('body')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <h3>Clientes</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar cliente</a>
        </div>
    </div>

    <div class="card shadow card-table border-start-0 col-md-12">
        <div class="col-md-12">
            <table class="table tbl-datatable table-hover" id="clientsTable">
                <thead>
                    <tr class="tbl-header">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($clients as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->client_firstname }} {{ $c->client_lastname }}</td>
                    <td>{{ $c->client_address }}</td>
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
    </div>    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('#clientsTable').DataTable({
            columnDefs: [ 
                { orderable: false, targets: [2,3,4] },
            ]
        });
    });
    </script>
@endsection