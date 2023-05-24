@extends('body')

@section('content')
    <div class="col-md-12 pt-4 mb-4 agenda-content">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col text-end">
            <a href="{{ route('services.create') }}" class="btn btn-primary">Nuevo Servicio</a>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Egreso</a>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <table class="table table-striped" id="services">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Vehiculo</th>
                    <th>Estatus</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th class="text-end">Importe</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($services as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->service_comment }}</td>
                    <td>{{ $s->model_make }} {{ $s->model_name }}</td>
                    <td>{{ $s->status }}</td>
                    <td>
                        <a href="{{ route('clients.show',$s) }}">{{ $s->client_firstname }} {{ $s->client_lastname }}</a>
                    </td>
                    <td>{{ $s->updated_at }}</td>
                    <td class="text-end">$ {{ number_format($s->service_price, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#services').DataTable({
            "pageLength": 20,
            "lengthMenu": [20, 40, 80, 100],
        });
    });
    </script>
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection