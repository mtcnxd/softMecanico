@extends('body')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >
@endsection

@section('content')
    <div class="col-md-12 pt-4 mb-4 agenda-content">
        <h3>Agenda</h3>
        <div class="col-md-6">
            <span class="text-muted">Lista de eventos y servicios de mayo</span>
        </div>
        <div class="col text-end">
            <a href="{{ route('calendar.create') }}" class="btn btn-primary">Agregar Evento</a>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <div class="card p-4 shadow">
            <div class="row">
                @foreach ($calendar as $c)
                <div class="col-md-6">
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
                                    <div class="col-md-9">
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
    </div>    
@endsection