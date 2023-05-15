@extends('body')

@section('content')
    <div class="row pt-2 mb-4 page-title">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Egreso</a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST" class="form-floating row g-3">
                @csrf

                <div class="col-md-6 mb-3">
                    <label>Cliente</label>
                    <input type="text" placeholder="Escriba para buscar" class="form-control" name="service_client" id="service_client">
                    <input type="hidden" name="service_client_id" id="service_client_id">
                    <ul id="results_list"></ul>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Telefono</label>
                    <input type="text" class="form-control" name="service_phone" id="service_phone">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label>Automovil</label>
                    <select type="text" class="form-control" name="service_vehicle" id="service_vehicle">
                        <option>Seleccionar ... </option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Kilometraje</label>
                    <input type="text" class="form-control" name="service_mileage">
                </div>
                
                <div class="col-md-12">
                    <label>Servicio</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="service_service">
                            <option value="1">Mantenimiento correctivo</option>
                            <option value="2">Mantenimiento preventivo</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label>Comentarios</label>
                    <textarea class="form-control" name="service_comment"></textarea>
                </div>

                <div class="col-md-12">
                    <label>Importe cobrado</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">$</span>
                        <input type="text" class="form-control" name="service_price">
                        <span class="input-group-text" id="basic-addon2">.00</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://releases.jquery.com/git/ui/jquery-ui-git.js"></script>
<script>
    $("#service_client").autocomplete({
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
                            "<li onclick=client_select("+list.id+","+list.phone+")>"+list.name+"</li>"
                        );
                    });
                }
            })
        }
    });

    function client_select(clientid, phone){
        $('#service_client_id').val(clientid)
        $('#service_phone').val(phone)
        $('#results_list').hide()
        $('#service_vehicle').empty()
        load_vehicles(clientid)

    }

    function load_vehicles(clientid){
        $.ajax({
            url: "{{ route('search.vehicles') }}",
            dataType: 'json',
            data: {
                term: clientid
            },
            success: function(data){
                data.forEach(list => {
                    $('#service_vehicle').append('<option value='+list.id+'>' + list.plate + '</option>') 
                });
            }
        });
    }
</script>    
@endsection