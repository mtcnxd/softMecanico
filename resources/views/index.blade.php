@extends('body')

@section('content')
    <div class="row pt-2 mb-4">
        <h2>Dashboard</h2>
        <span class="text-muted">Resumen de movimientos de la semana en curso</span>            
    </div>

    <div class="agenda-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <p class="card-title">Ingresos del mes</p>
                        <p class="card-stats">${{ $ingresosTotal }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <p class="card-title">Clientes activos</p>
                        <p class="card-stats">{{ $clientsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <p class="card-title">Servicios realizados</p>
                        <p class="card-stats">${{ $ingresosTotal }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <p class="card-title">Pendientes en la agenda</p>
                        <p class="card-stats">{{ $calendarPending }}</p>
                    </div>
                </div>
            </div>            
        </div>
    </div>    
@endsection
