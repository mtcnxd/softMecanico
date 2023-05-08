<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('main.css') }}" rel="stylesheet" >    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('includes.sidebar')

    <div class="content">
        <div class="row pt-2">
            <h3>Nuevo cliente</h3>
        </div>
        <div class="row col-md-6">
            <form class="row g-3" action="{{ route('clients.store') }}" method="POST">
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
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Estado</label>
                    <select id="inputState" class="form-select" name="client_state">
                        <option selected>Choose...</option>
                        <option>Campeche</option>
                        <option>Yucatan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" name="client_postalcode">
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

</body>
</html>