@extends('body')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="div-content border-bottom pb-2 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3>Agenda</h3>
                <span class="text-muted">Lista de eventos y servicios de mayo</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('calendar.create') }}" class="dropdown-item">Agregar Evento</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content">
        <div class="row">
            @foreach ($calendar as $c)
            <div class="col-md-6 pl-0">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-2 border-end bg-light rounded-start-2">
                            <div class="agenda">
                                <div class="agenda-header">{{ \Carbon\Carbon::parse($c->date)->formatLocalized('%B') }}</div>
                                <div class="agenda-body">{{ \Carbon\Carbon::parse($c->date)->format('d') }}</div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ route('calendar.edit', $c) }}" style="text-decoration:none; color:#222;">
                                <div class="row">
                                    <div class="col-md-9 p-0">
                                        <p class="agenda-title">{{ $c->title }}</p>
                                    </div>
                                    <div class="col-md-3 text-end align-self-end">
                                        <span class="span-{{ strtolower($c->status) }}">{{$c->status}}</span>
                                    </div>
                                </div>
                                <p class="agenda-comment">{{ $c->comment }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>    
@endsection