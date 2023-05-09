<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>

    <link href="https://releases.jquery.com/git/ui/jquery-ui-git.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('main.css') }}" rel="stylesheet" >    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    @include('includes.sidebar')

    <div class="content">
        <div class="row pt-2 mb-4">
            <h2>Servicios</h2>
        </div>

        <div class="row mb-4">
            <div class="col-md-10">
                <span class="text-muted">Lista de servicios del mes de mayo</span>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar Egreso</a>
            </div>
        </div>        

        <div class="row">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label>Automovil</label>
                        <select type="text" class="form-control" name="service_vehicle" id="service_vehicle">
                            <option>Seleccionar ... </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label>Servicio</label>                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="service_name">
                        <span class="input-group-text" id="basic-addon2">
                            <button class="btn btn-icon btn-xs">Agregar</button>
                        </span>
                    </div>
                </div>

                <table class="table">
                    <tr>
                        <td>Cantidad</td>
                        <td>Concepto</td>
                        <td>Precio.U</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mantenimiento Menor</td>
                        <td>$ 550</td>
                        <td>$ 550</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

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