@extends('body')

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Nuevo Vehiculo</a>
        </div>
    </div>

    <div class="col-md-12">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <label>Cliente</label>
                                <input type="text" placeholder="Escriba para buscar" class="form-control" name="client_name" id="client_name">
                                <input type="hidden" name="client_id" id="client_id">
                                <ul id="results_list"></ul>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label class="form-label">Marca de automovil</label>
                                <div class="input-group mb-3"   >
                                    <select class="form-select" name="vehicle" id="vehicle">
                                        <option>Seleccionar ... </option>
                                    </select>
                                    <span class="input-group-text" id="basic-addon2">
                                        <a href="{{ route('vehicles.create') }}" class="btn btn-icon">Crear</a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Kilometraje</label>
                                <input type="text" class="form-control" name="mileage" value="{{ $serviceInfo->mileage }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="col-md-12">
                                <label>Servicio</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="service" value="{{ $serviceInfo->service }}" disabled>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Comentarios</label>
                                <textarea class="form-control" name="comment">{{ $serviceInfo->comment }}</textarea>
                                <input type="hidden" name="status" value="Pendiente">
                            </div>
        
                            <div class="col-md-3">
                                <label>Precio aproximado</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="price" value="{{ $serviceInfo->aprox_price }}" disabled>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>Precio real</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">$</span>
                                    <input type="text" class="form-control" name="price" value="{{ $serviceInfo->aprox_price }}">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
        
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://releases.jquery.com/git/ui/jquery-ui-git.js"></script>
<script>
    function clientSelect(clientid, phone){
        $('#client_id').val(clientid)
        $('#phone').val(phone)
        $('#results_list').hide()
        $('#vehicle').empty()
        loadVehicles(clientid)
    }

    function loadVehicles(clientid){
        $.ajax({
            url: "{{ route('search.vehicles') }}",
            dataType: 'json',
            data: {
                term: clientid
            },
            success: function(data){
                data.forEach(list => {
                    $('#vehicle').append('<option value='+list.id+'>' + list.plate + '</option>') 
                });
            }
        });
    }    

    $(document).ready(function(){
        $("#client_name").autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('search.clients') }}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        $('#results_list').empty()
                        $('#results_list').show()
                        data.forEach((list, i) => {
                            $("#results_list").append(
                                "<li onclick=clientSelect("+list.id+","+list.phone+")>"+list.name+"</li>"
                            );
                        });
                    }
                })
            }
        });
    })
</script>    
@endsection