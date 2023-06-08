@extends('body')

@section('content')
    <div class="div-content mb-4">
        <div class="row">
            <h2>Dashboard</h2>
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="div-content mb-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <a href="{{ route('reports') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Ingresos del mes</p>
                            <div class="align-items-center row">
                                <div class="col">
                                    <p class="card-stats-3">$ {{ $ingresosTotal }}</p>
                                </div>
                                <div class="col-auto">
                                    <x-feathericon-activity style="height:20px"/>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <a href="{{ route('clients') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Clientes activos</p>
                            <div class="align-items-center row">
                                <div class="col">
                                    <p class="card-stats-3">{{ $clientsCount }}</p>
                                </div>
                                <div class="col-auto">
                                    <x-feathericon-users style="height:20px"/>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <a href="{{ route('service') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Servicios Pendientes</p>
                            <div class="align-items-center row">
                                <div class="col">
                                    <p class="card-stats-3">{{ $pendingServices }}</p>
                                </div>
                                <div class="col-auto">
                                    <x-feathericon-database style="height:20px"/>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <a href="{{ route('calendar') }}">
                        <div class="card-body text-center">
                            <p class="card-title">Pendientes en la agenda</p>
                            <div class="align-items-center row">
                                <div class="col">
                                    <p class="card-stats-3">{{ $calendarPending }}</p>
                                </div>
                                <div class="col-auto">
                                    <x-feathericon-calendar style="height:20px"/>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="div-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>User</td>
                                <td>Sesion</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
