@extends('body')

@section('content')
    <div class="col-md-12 div-content pt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Servicios</h3>
                <span class="text-muted">Resumen de movimientos de la semana en curso</span>
            </div>
            <div class="col text-end">
                <a href="{{ route('services.create') }}" class="btn btn-primary">Nuevo Servicio</a>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Egreso</a>
            </div>
        </div>
    </div>

    <div class="col-md-12 div-content">
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
                        <th class="text-end">Precio aprox.</th>
                        <th class="text-end">Precio real.</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td><a href="{{ route('services.edit', $service) }}">{{ $service->service }}</a></td>
                        <td>{{ $service->vehicle }}</td>
                        <td><span class="span-{{ strtolower($service->status) }}">{{ $service->status }}</span></td>
                        <td><a href="{{ route('clients.show',$service) }}">{{ $service->firstname }} {{ $service->lastname }}</a></td>
                        <td>{{ \Carbon\Carbon::parse($service->updated_at)->format('d-m-Y') }}</td>
                        <td class="text-end fw-semibold">$ {{ number_format($service->aprox_price, 2) }}</td>
                        <td class="text-end fw-semibold">$ {{ number_format($service->real_price, 2) }}</td>
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