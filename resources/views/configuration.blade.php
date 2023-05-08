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
            <div class="col">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Marcas</h5>
                            Se muestran los ultimos agregados
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('makes.index') }}" class="btn btn-sm btn-primary">Nuevo</a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table">
                            <tr class="tbl-header">
                                <td>ID</td>
                                <td>Marca</td>
                                <td></td>
                            </tr>
                            @foreach ($makes as $make)
                            <tr>
                                <td>{{ $make->id }}</td>
                                <td>{{ $make->make_name }}</td>
                                <td class="text-end">
                                    <form action="{{ route('makes.destroy', $make) }}" method="POST">
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
            <div class="col">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-10">
                            <h5 class="mb-1">Modelos</h5>
                            Modelos de vehiculos
                        </div>
                        <div class="col-md-2 text-end pt-2">
                            <a href="{{ route('models.index') }}" class="btn btn-sm btn-primary">Nuevo</a>
                        </div>
                    </div>
                    <div class="overflow-auto tbl-container">
                        <table class="table table-hover">
                            <tr class="tbl-header">
                                <td>ID</td>
                                <td>Marca</td>
                                <td>Modelo</td>
                                <td></td>
                            </tr>
                            @foreach ($models as $model)
                            <tr>
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->make_name }}</td>
                                <td>{{ $model->model_name }}</td>
                                <td class="text-end">
                                    <form action="{{ route('makes.destroy', $model) }}" method="POST">
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

        <div class="row pt-4">
            <div class="col">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Automoviles</h5>
                        </div>
                        <div class="col-md-2 text-end">
                            <button class="btn btn-sm btn-primary">Nuevo</button>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tr class="tbl-header">
                        <tr>
                            <td>#</td>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>Automovil</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Servicios</h5>
                        </div>
                        <div class="col-md-2 text-end">
                            <button class="btn btn-sm btn-primary">Nuevo</button>
                        </div>
                    </div>
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

    </div>
</body>
</html>