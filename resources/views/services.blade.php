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
        <div class="row pt-2 mb-4">
            <h2>Servicios</h2>
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>            
        </div>

        <div class="row">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf

            </form>
        </div>
    </div>

</body>
</html>