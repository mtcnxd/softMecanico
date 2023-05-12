@extends('body')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <div class="col-md-12">
            <h3>Agenda</h3>
        </div>
        <div class="col-md-6">
            <span class="text-muted">Lista de eventos y servicios de mayo</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar Egreso</a>
        </div>
    </div>

    <div class="card shadow card-table border-start-0 col-md-12">
        <div class="col-md-4">

            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-3 bg-secondary">
                        Icon
                    </div>
                    <div class="col-md-9">
                        Mantenimiento menor a camioneta Ford Ranger
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-3 bg-secondary">
                        Icon
                    </div>
                    <div class="col-md-9">
                        Cambio de amortiguadores traseros de camioneta don Ricardo
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-3 bg-secondary">
                        Icon
                    </div>
                    <div class="col-md-9">
                        Mantenimiento menor a camioneta Chevrolet S10
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="row">
                    <div class="col-md-3 bg-secondary">
                        Icon
                    </div>
                    <div class="col-md-9">
                        Cambio de balatas delanteras y revision de suspencion Chevy
                    </div>
                </div>
            </div>

        </div>
    </div>    
@endsection