@extends('body')

@section('content')
    <div class="row pt-2 mb-4">
        <h2>Dashboard</h2>
        <span class="text-muted">Resumen de movimientos de la semana en curso</span>            
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header">
                    Comparacion con semanas anteriores
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center">
                    Ingresos
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center">
                    Egresos
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header text-center">
                    Clientes
                </div>
                <div class="card-body text-center">
                    <p class="card-stats">{{ $clientsCount }}</p>
                </div>
            </div>
        </div>
    </div>    
@endsection
