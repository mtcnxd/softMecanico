<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('main.css') }}" rel="stylesheet" >

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('includes.sidebar')

    <div class="content">
        <div class="row pt-4">
            <div class="col-md-4">
                @if ( isset($message) )
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Crear nuevo</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('makes.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Marca de automovil</label>
                                <input type="text" class="form-control" name="make_name">
                            </div>
                            <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="row">
                        <h5>Marcas</h5>
                        <p>Marcas de vehiculos</p>
                    </div>
                    <table class="table table-hover">
                        <tr class="tbl-header">
                            <td>ID</td>
                            <td>Marca</td>
                            <td></td>
                        </tr>
                        @foreach ($makes as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
                            <td>{{ $m->make_name }}</td>
                            <td class="text-end">
                                <form action="{{ route('makes.destroy', $m) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn-icon">
                                        <x-feathericon-trash-2 style="height:19px"/>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>            
        </div>

    </div>
</body>
</html>