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
        <h2>Dashboard</h2>
        <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        <div class="row pt-4">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="fs-6">Comparacion con semanas anteriores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Ingresos
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Egresos
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Balance
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>