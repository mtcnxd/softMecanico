@extends('body')

@section('content')
    <div class="row pt-4">
        <div class="col-md-7">
            <div class="card shadow p-0">
                <div class="card-header">
                    <h5>Alta nuevo cliente</h5>
                </div>

                <div class="card-body">
                    <form class="form-floating row g-3" action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="client_firstname">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="client_lastname">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="client_address">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="client_city">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Codigo Postal</label>
                            <input type="text" class="form-control" name="client_postalcode" id="postcode">
                        </div>
                        <div class="col-md-4">
                            <label for="selectState" class="form-label">Colonia</label>
                            <select id="selectState" class="form-select" name="colonia">
                                <option>Seleccionar colonia ...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Correo</label>
                            <input type="text" class="form-control" name="client_email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="client_phone">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow p-0">
                <div class="card-header">
                    <h5>Información adicional</h5>
                </div>

                <div class="card-body">
                    <label class="form-label">Comentarios</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
        </div>

    </div>    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#postcode").on('input',function(event){
                let pc = $(this).val()
                
                if (pc.length > 4){
                    $.ajax({
                        url:'http://sepomex.789.mx/' + pc,
                        success: function(response){
                            $("#selectState").empty()
                            response.asentamientos.forEach(asentamiento => {
                                $("#selectState").append("<option>" + asentamiento + "</option>")
                            })
                        }
                    });
                }

            })
        })
    </script>
@endsection