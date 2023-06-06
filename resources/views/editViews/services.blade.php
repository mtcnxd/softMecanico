@extends('body')

@section('content')
    <div class="div-content mb-4">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="div-content">
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
                            <textarea class="form-control" name="comment" disabled>{{ $serviceInfo->description }}</textarea>
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

    <form action="{{ route('services.update', $serviceInfo) }}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-md-12 div-content pb-4">
            <div class="row">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <label>Precio real</label>
                            <div class="input-group mb-3"   >
                                <input type="text" class="form-control" name="real_price" id="real_price" value="{{ $serviceInfo->real_price }}">
                                <ul id="results_list"></ul>
                                <span class="input-group-text" id="basic-addon2">
                                    <a href="#" id="abono" class="btn btn-icon">Abono</a>
                                </span>
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
                            <textarea class="form-control" name="comment">{{ $serviceInfo->comment }}</textarea>
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

<!-- Modal -->
<div class="modal fade" id="modalAbonos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        $("#abono").on('click', function(button){
            button.preventDefault()
            $("#modalAbonos").modal('show')
        })
    })
</script>
@endsection