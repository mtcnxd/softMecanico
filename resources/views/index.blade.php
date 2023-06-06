@extends('body')

@section('content')
    <div class="div-content mb-4">
        <div class="row">
            <h2>Dashboard</h2>
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="div-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow">
                    <a href="{{ route('reports') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Ingresos del mes</p>
                            <p class="card-stats-3">$ {{ $ingresosTotal }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <a href="{{ route('clients') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Clientes activos</p>
                            <p class="card-stats-3">{{ $clientsCount }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <a href="{{ route('service') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Servicios Pendientes</p>
                            <p class="card-stats-3">{{ $pendingServices }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <a href="{{ route('calendar') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Pendientes en la agenda</p>
                            <p class="card-stats-3">{{ $calendarPending }}</p>
                        </div>
                    </a>
                </div>
            </div>            
        </div>
    </div>    
@endsection
