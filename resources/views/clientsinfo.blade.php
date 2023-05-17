@extends('body')

@section('content')
    <div class="col-md-12 pt-2 mb-4 agenda-content">
        <h3>Detalles del cliente</h3>
        <div class="col-md-6">
            <span class="text-muted">Historial y detalles del cliente.</span>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/profile.png') }}" style="width: 100%">
                            </div>
                            <div class="col" style="padding-top: 20px">
                                <h5>{{ $clientInfo->client_firstname }} {{ $clientInfo->client_lastname }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <p class="contact-title">
                            <x-feathericon-map-pin style="height:20px"/>
                            Direccion:
                        </p>
                        <p>{{ $clientInfo->client_address }}</p>
                        <p class="contact-title">
                            <x-feathericon-phone style="height:20px"/>
                            Telefono:
                        </p>
                        <p><a href="tel:+{{ $clientInfo->client_phone }}">{{ $clientInfo->client_phone }}</a></p>
                        <p class="contact-title">
                            <x-feathericon-mail style="height:20px"/>
                            Correo:
                        </p>
                        <p><a href="mailto:{{ $clientInfo->client_email }}">{{ $clientInfo->client_email }}</a></p>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                <table class="table table-bordered" id="client_services">
                    <thead class="text-uppercase fw-medium">
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Kilometraje</th>
                        <th>Estatus</th>
                        <th class="text-end">Importe</th>
                    </thead>
                    <tbody>
                        @foreach ($serviceInfo as $k => $v)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $v->service_comment }}</td>
                                <td>{{ $v->service_mileage }}</td>
                                <td>{{ $v->status }}</td>
                                <td class="text-end">$ {{ number_format($v->service_price,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection