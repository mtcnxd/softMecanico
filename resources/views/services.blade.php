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
        <div class="card p-4 shadow">
            <table class="table table-striped" id="services">
                <thead>
                    <tr class="table-header">
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
                        <td>
                            <a href="{{ route('services.show', $s) }}">{{ $s->service }}</a></td>
                        <td>{{ $s->make }} {{ $s->name }}</td>
                        <td class="text-status-{{ $s->status }}">{{ $s->status }}</td>
                        <td>
                            <a href="{{ route('clients.show',$s) }}">{{ $s->firstname }} {{ $s->lastname }}</a>
                        </td>
                        <td>{{ $s->updated_at }}</td>
                        <td class="text-end">$ {{ number_format($s->price, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#services').DataTable({
            "pageLength": 15,
            "lengthMenu": [15, 30, 60, 100],
        });
    });
    </script>
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection