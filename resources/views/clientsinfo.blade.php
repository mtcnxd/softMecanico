@extends('body')

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <h3>Clientes</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <div class="row">
            <div class="col-md-3 card">
                <div class="card-body">
                    <img src="{{ asset('images/profile.png') }}" style="max-width:300px" >
                    <h4>{{ $clientInfo->client_firstname }} {{ $clientInfo->client_lastname }}</h4>

                    <p class="contact-title">Direccion:</p>
                    <p>{{ $clientInfo->client_address }}</p>
                    <p class="contact-title">Telefono:</p>
                    <p><a href="tel:+{{ $clientInfo->client_phone }}">{{ $clientInfo->client_phone }}</a></p>
                    <p class="contact-title">Correo:</p>
                    <p><a href="mailto:{{ $clientInfo->client_email }}">{{ $clientInfo->client_email }}</a></p>
                </div>
            </div>

            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead class="text-uppercase fw-medium">
                        <th>Service</th>
                        <th>Kilometraje</th>
                        <th>Estatus</th>
                        <th>Importe</th>
                    </thead>
                    <tbody>
                        @foreach ($serviceInfo as $s)
                            <tr>
                                <td>{{ $s->service_comment }}</td>
                                <td>{{ $s->service_mileage }}</td>
                                <td>{{ $s->status }}</td>
                                <td>{{ $s->service_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection