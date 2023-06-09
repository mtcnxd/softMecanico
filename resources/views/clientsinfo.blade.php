@extends('body')

@section('content')
    <div class="col-md-12 pt-2 mb-4 div-content">
        <h3>Detalles del cliente</h3>
        <div class="col-md-6">
            <span class="text-muted">Historial y detalles del cliente.</span>
        </div>
    </div>

    <div class="col-md-12 div-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/profile.png') }}" style="width: 100%">
                            </div>
                            <div class="col" style="padding-top: 20px">
                                <h5>{{ $clientInfo->firstname }} {{ $clientInfo->lastname }}</h5>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('clients.edit', $clientInfo) }}">Editar</a>
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <p class="contact-title">
                            <x-feathericon-map-pin style="height:20px"/>
                            Direccion:
                        </p>
                        <p>{{ $clientInfo->address1 }}</p>
                        <p class="contact-title">
                            <x-feathericon-phone style="height:20px"/>
                            Telefono:
                        </p>
                        <p><a href="tel:+{{ $clientInfo->phone }}">{{ $clientInfo->phone }}</a></p>
                        <p class="contact-title">
                            <x-feathericon-mail style="height:20px"/>
                            Correo:
                        </p>
                        <p><a href="mailto:{{ $clientInfo->email }}">{{ $clientInfo->email }}</a></p>
                    </div>
                </div>

                @if($clientInfo->comment)
                    <div class="card">
                        <div class="card-body">
                            <p class="contact-title">
                                <x-feathericon-info style="height:20px"/>
                                Comentario:
                            </p>
                            <p>{{ $clientInfo->comment }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-9">
                <h4>Autos del cliente</h4>
                <table class="table mb-5" id="vehicles">
                    <thead class="text-uppercase fw-medium">
                        <th width="35px">#</th>
                        <th>Automovil</th>
                        <th>Placa</th>
                        <th>Color</th>
                    </thead>
                    <tbody>
                        @foreach ($vehiclesInfo as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <a href="#" data-client-id={{$client_id}} data-client-vehicle="{{ $item->make }} {{ $item->name }}">
                                        {{ $item->make }} {{ $item->name }}
                                    </a>
                                </td>
                                <td>{{ $item->plate }}</td>
                                <td>{{ $item->color }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h4>Servicios realizados</h4>
                <table class="table" id="services">
                    <thead class="text-uppercase fw-medium">
                        <th width="35px">#</th>
                        <th>Servicio</th>
                        <th>Kilometraje</th>
                        <th>Estatus</th>
                        <th class="text-end">Importe</th>
                    </thead>
                    <tbody>
                        @foreach ($serviceInfo as $k => $v)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $v->description }}</td>
                                <td>{{ $v->mileage }}</td>
                                <td>{{ $v->status }}</td>
                                <td class="text-end">$ {{ number_format($v->price,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal-content')
    <ul id="result-list">
    </ul>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        const vehicles = document.querySelectorAll("a[data-client-id]");

        vehicles.forEach((item)=> {
            item.addEventListener('click', button => {
                button.preventDefault()
                clientid = button.target.dataset.clientId
                clientvehicle = button.target.dataset.clientVehicle

                $.ajax({
                    url: '{{ route('search.services') }}',
                    data:{
                        clientid:clientid,
                        clientvehicle:clientvehicle
                    },
                    success:function(response){
                        $("#result-list").empty()

                        if(response.length < 1){
                            $("#result-list").append('<li>El auto no tiene servicios registrados</li>')
                        }

                        response.forEach((item) => {
                            $("#result-list").append('<li>' + item.service + ' (' + item.description + ') </li>')
                        })
                        $("#modal").modal('show')
                    }
                })
            });
        })    
    })
</script>
@endsection