@extends('body')

@section('content')
<div class="div-content pb-2 mb-2">
    <div class="row">
        <div class="col-md-6">
            <h4>Nuevo servicio</h4>
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>
</div>

<div class="div-content">
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="row mb-4">
            <div class="col-md-6 pl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <label class="form-label">Cliente</label>
                            <div class="input-group mb-3"   >
                                <input type="text" placeholder="Escriba para buscar" class="form-control" name="client_name" id="client_name">
                                <input type="hidden" name="client_id" id="client_id">
                                <ul id="results_list"></ul>
                                <span class="input-group-text" id="basic-addon2">
                                    <a href="{{ route('clients.create') }}" class="btn btn-icon">Nuevo</a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <label class="form-label">Modelo de automovil</label>
                            <div class="input-group mb-3"   >
                                <select class="form-select" name="vehicle" id="vehicle">
                                    <option>Seleccionar ... </option>
                                </select>
                                <span class="input-group-text" id="basic-addon2">
                                    <a href="{{ route('vehicles.create') }}" class="btn btn-icon">Nuevo</a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Kilometraje</label>
                            <input type="text" class="form-control" name="mileage">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 pl-0">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <label class="form-label">Servicio</label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="service">
                                    <option>Frenos</option>
                                    <option>Servicio menor</option>
                                    <option>Servicio mayor</option>
                                    <option>Suspención</option>
                                    <option>Mantenimiento correctivo</option>
                                    <option>Mantenimiento preventivo</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Descripcion</label>
                            <textarea class="form-control" name="description"></textarea>
                            <input type="hidden" name="status" value="Pendiente">
                        </div>
    
                        <div class="col-md-3">
                            <label class="form-label">Importe</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price">
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
                if(data.length < 1){
                    $("#vehicle").append(
                        "<option>El cliente no tiene autos registrados</option>"
                    );
                }

                console.log(data)

                data.forEach(list => {
                    $('#vehicle').append('<option>' + list.plate + '</option>') 
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

                        if(data.length < 1){
                            $("#results_list").append(
                                "<li>No se encontro ningun cliente</li>"
                            );
                        }

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