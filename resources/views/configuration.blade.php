@extends('body')

@section('content')
    <div class="div-content pb-2 mb-2">
        <div class="row">
            <div class="col-md-6">
                <h4>Configuracion</h4>
                <span class="text-muted">Resumen de movimientos de la semana en curso</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('makes.index') }}" class="dropdown-item">Nueva marca</a></li>
                        <li><a href="{{ route('models.index') }}" class="dropdown-item">Nuevo modelo</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="dropdown-item">Nuevo automovil</a></li>
                        <li><a href="{{ route('clients.create') }}" class="dropdown-item">Nuevo servicio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content">
        <div class="row">
            <div class="col pl-0">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Marcas</h5>
                            Se muestran los ultimos agregados
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('makes.index') }}" class="btn btn-sm btn-primary">
                                <x-feathericon-plus style="height:20px"/>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-header">
                                    <td>ID</td>
                                    <td>Marca</td>
                                    <td></td>
                                </tr>
                            </thead>
                            @foreach ($makes as $make)
                            <tr>
                                <td>{{ $make->id }}</td>
                                <td>{{ $make->name }}</td>
                                <td class="text-end">
                                    <form action="{{ route('makes.destroy', $make) }}" method="POST">
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
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Modelos</h5>
                            Modelos de vehiculos
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('models.index') }}" class="btn btn-sm btn-primary">
                                <x-feathericon-plus style="height:20px"/>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-header">
                                    <td>ID</td>
                                    <td>Marca</td>
                                    <td>Modelo</td>
                                    <td></td>
                                </tr>
                            </thead>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->make }}</td>
                                <td>{{ $model->name }}</td>
                                <td class="text-end">
                                    <form action="{{ route('models.destroy', $model) }}" method="POST">
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
            </div>
        </div>
    </div>

    <div class="div-content">
        <div class="row pt-4">
            <div class="col pl-0">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Automoviles</h5>
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('vehicles.index') }}" class="btn btn-sm btn-primary">
                                <x-feathericon-plus style="height:20px"/>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-header">
                                    <td>ID</td>
                                    <td>Marca</td>
                                    <td>Modelo</td>
                                    <td>Automovil</td>
                                    <td>Cliente</td>
                                    <td></td>
                                </tr>
                            </thead>
                            @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->make }}</td>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->plate }}</td>
                                <td>{{ $vehicle->firstname }} {{ $vehicle->lastname }}</td>
                                <td class="text-end">
                                    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST">
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
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Servicios</h5>
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('models.index') }}" class="btn btn-sm btn-primary">
                                <x-feathericon-plus style="height:20px"/>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-header">
                                    <td>#</td>
                                    <td>Servicio</td>
                                    <td>Precio</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection