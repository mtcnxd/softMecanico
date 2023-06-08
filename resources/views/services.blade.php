@extends('body')

@section('content')
    <div class="div-content border-bottom pb-2 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h4>Servicios</h4>
                <span class="text-muted">Resumen de movimientos de la semana en curso</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('services.create') }}" class="dropdown-item">Nuevo servicio</a></li>
                        <li><a href="{{ route('egresos.create') }}" class="dropdown-item">Nuevo egreso</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content pb-4">
        <div class="card">
            <table class="table table-hover table-borderless" id="mytable">
                <thead>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Vehiculo</th>
                        <th>Servicio</th>
                        <th>Cliente</th>
                        <th>Estatus</th>
                        <th>Fecha Alta</th>
                        <th>Dias</th>
                        <th class="text-end">Precio.</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td><a href="{{ route('services.edit', $service) }}">{{ $service->vehicle }}</a></td>
                        <td>{{ $service->service }}</td>
                        <td><a href="{{ route('clients.show',$service->client_id) }}">{{ $service->firstname }} {{ $service->lastname }}</a></td>
                        <td><span class="span-{{ strtolower($service->status) }}">{{ $service->status }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($service->created_at)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($service->created_at)) }} dias</td>
                        <td class="text-end fw-semibold">$ {{ number_format($service->price, 2) }}</td>
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
@include('includes.datatable')
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection
