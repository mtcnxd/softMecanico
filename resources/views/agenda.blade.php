<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Mecanica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('main.css') }}" rel="stylesheet" >
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" >

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function () {
        $('#agenda').DataTable();
    });
    </script>
</head>

<body>
    @include('includes.sidebar')

    <div class="content">
        <div class="row">
            <h2>Agenda</h2>
        </div>

        <div class="row mb-4">
            <div class="col-md-10">
                <span class="text-muted">Lista de eventos y servicios de mayo</span>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar evento</a>
            </div>
        </div>

        <div class="card card-table border-start-0 col-md-12">
            <div class="col-md-12">
                <table class="table tbl-datatable table-hover" id="agenda">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th>Evento</th>
                            <th>Cliente</th>
                            <th>Automovil</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ now()->format('d-m-Y') }}</td>
                            <td>Mantenimiento menor</td>
                            <td>Marcos Tzuc</td>
                            <td>Volkswagen Vento</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                    <x-feathericon-eye style="height:20px"/>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>{{ now()->format('d-m-Y') }}</td>
                            <td>Mantenimiento mayor</td>
                            <td>Javier Rubio</td>
                            <td>Audi A3</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                    <x-feathericon-eye style="height:20px"/>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>{{ now()->format('d-m-Y') }}</td>
                            <td>Mantenimiento mayor</td>
                            <td>Alejandra Lopez</td>
                            <td>Chevrolet S10</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detalles" class="btn btn-icon btn-sm">
                                    <x-feathericon-eye style="height:20px"/>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @include('includes.modal')
            </div>
        </div>
    </div>
</body>
</html>