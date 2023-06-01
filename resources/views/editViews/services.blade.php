@extends('body')

@section('content')
    <div class="col-md-12 pt-4 mb-4 agenda-content">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="col-md-12 agenda-content">
        <div class="row mb-4">
            <div class="col-md-6 row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12 mb-3">
                            <label>Cliente</label>
                            <input type="text" class="form-control" name="client_name" id="client_name" value="{{$serviceInfo->firstname}} {{$serviceInfo->lastname}}" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Telefono</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$serviceInfo->phone}}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Marca de automovil</label>
                            <input type="text" class="form-control" name="vehicle" id="vehicle" value="{{ $serviceInfo->vehicle }}" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Kilometraje</label>
                            <input type="text" class="form-control" name="mileage" value="{{ $serviceInfo->mileage }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <label>Servicio</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="service" value="{{ $serviceInfo->service }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Comentarios</label>
                            <textarea class="form-control" name="comment" disabled>{{ $serviceInfo->comment }}</textarea>
                            <input type="hidden" name="status" value="Pendiente">
                        </div>

                        <div class="col-md-6">
                            <label>Precio aproximado</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price" value="{{ $serviceInfo->aprox_price }}" disabled>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <form action="{{ route('services.store') }}" method="POST" class="row">
        @csrf
        <div class="col-md-12 agenda-content">
            <div class="row">
                <div class="card shadow">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <label>Precio real</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price" value="{{ $serviceInfo->aprox_price }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Status</label>
                            <select class="form-select" name="status">
                                <option>Pendiente</option>
                                <option>Refacciones</option>
                                <option>Finalizado</option>
                                <option>Entregado</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Comentarios</label>
                            <textarea class="form-control" name="comment"></textarea>
                            <input type="hidden" name="status" value="Pendiente">
                        </div>
    
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
@endsection