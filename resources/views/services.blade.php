@extends('body')

@section('content')
    <div class="div-content border-bottom pb-2 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Servicios</h3>
                <span class="text-muted">Resumen de movimientos de la semana en curso</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('services.create') }}" class="dropdown-item">Nuevo servicio</a></li>
                        <li><a href="{{ route('egresos.create') }}" class="dropdown-item">Nuevo egreso</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content">
        <div class="card p-4">
            <table class="table table-striped" id="services">
                <thead>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Vehiculo</th>
                        <th>Servicio</th>
                        <th>Cliente</th>
                        <th>Estatus</th>
                        <th>Fecha Alta</th>
                        <th>Dias</th>
                        <th class="text-end">Precio aprox.</th>
                        <th class="text-end">Precio real.</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td><a href="{{ route('services.edit', $service) }}">{{ $service->vehicle }}</a></td>
                        <td>{{ $service->service }}</td>
                        <td><a href="{{ route('clients.show',$service) }}">{{ $service->firstname }} {{ $service->lastname }}</a></td>
                        <td><span class="span-{{ strtolower($service->status) }}">{{ $service->status }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($service->created_at)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($service->created_at)) }} dias</td>
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
            "order": [4, 'desc']
        });
    });
    </script>
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection