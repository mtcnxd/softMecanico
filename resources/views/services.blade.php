@extends('body')

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('services.create') }}" class="btn btn-primary">Nuevo Servicio</a>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Egreso</a>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" class="text-end">Importe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->client_firstname }} {{ $s->client_lastname }}</td>
                        <td>{{ $s->service_comment }}</td>
                        <td>{{ $s->status }}</td>
                        <td>{{ $s->model_make }} {{ $s->model_name }}</td>
                        <td class="text-end">$ {{ number_format($s->service_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection