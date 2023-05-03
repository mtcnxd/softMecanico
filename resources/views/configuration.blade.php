<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('main.css') }}" rel="stylesheet" >

</head>
<body>
    @include('includes.sidebar')

    <div class="main-container">
        <h5>Marcas</h5>
        <p>Marcas de vehiculos</p>
        <div class="row mb-4 border">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <td>#</td>
                        <td>Marca</td>
                    </tr>
                </table>
            </div>
        </div>

        <h5>Modelos</h5>
        <p>Modelos de vehiculos</p>
        <div class="row mb-4 border">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <td>#</td>
                        <td>Marca</td>
                        <td>Modelo</td>
                    </tr>
                </table>
            </div>
        </div>

        <h5>Automovil</h5>
        <div class="row mb-4 border">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <td>#</td>
                        <td>Marca</td>
                        <td>Modelo</td>
                        <td>Automovil</td>
                    </tr>
                </table>
            </div>
        </div>                

        <h5>Servicios</h5>
        <div class="row mb-4 border">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <td>#</td>
                        <td>Servicio</td>
                        <td>Precio</td>
                    </tr>
                </table>
            </div>
        </div>        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>