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
            <a href="{{ route('calendar.create') }}" class="btn btn-primary">Agregar Evento</a>
        </div>
    </div>

    <div class="card shadow card-table col-md-12">
        <div class="agenda-content">
            <div class="row">
                <div class="col-md-6">
                    @foreach ($calendar as $c)
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-2 border-end bg-light rounded-start-2">
                                <div class="agenda">
                                    <div class="agenda-header">{{ \Carbon\Carbon::parse($c->date)->formatLocalized('%B') }}</div>
                                    <div class="agenda-body">{{ \Carbon\Carbon::parse($c->date)->format('d') }}</div>
                                </div>
                            </div>
                            <div class="col">
                                <p class="agenda-title">{{ $c->title }}</p>
                                <p class="agenda-comment">{{ $c->comment }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
@endsection