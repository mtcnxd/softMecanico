@extends('body')

@section('content')
    <div class="div-content pb-2 mb-2">
        <div class="row">
            <div class="col-md-6">
                <h4>Clientes</h4>
                <span class="text-muted">Resumen de movimientos de la semana en curso</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('clients.create') }}" class="dropdown-item">Nuevo cliente</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content pb-4">
        <div class="card shadow-sm">
            <table class="table table-hover table-borderless" id="mytable">
                <thead>
                    <tr class="table-header">
                        <th width="70px">Cliente</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Colonia</th>
                        <th>Codigo Postal</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($clients as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td><a href="{{ route('clients.show', $c) }}">{{ $c->firstname }} {{ $c->lastname }}</a></td>
                        <td>{{ $c->address1 }}</td>
                        <td>{{ $c->address2 }}</td>
                        <td>{{ $c->postalcode }}</td>
                        <td><a href="#">{{ $c->email }}</a></td>
                        <td>{{ $c->phone }}</td>
                        <td class="text-end">
                            <form action="{{ route('clients.destroy', $c) }}" method="POST">
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
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@include('includes.datatable')
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection
