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
        $('#clientsTable').DataTable({
            columnDefs: [ 
                { orderable: false, targets: [2,3,4] },
            ]
        });
    });
    </script>
</head>

<body>
    @include('includes.sidebar')

    <div class="content">
        <div class="row pt-2 mb-2">
            <h3>Clientes</h3>
        </div>

        <div class="row mb-4">
            <div class="col-md-10">
                <h6>Lista de clientes</h6>
            </div>
            <div class="col-md-2 text-end">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Agregar cliente</a>
            </div>
        </div>

        <div class="row">
            <div class="card card-table border-start-0 col-md-12">
                <table class="table table-hover tbl-datatable" id="clientsTable">
                    <thead>
                        <tr class="tbl-header">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach ($clients as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->client_firstname }} {{ $c->client_lastname }}</td>
                        <td>{{ $c->client_address }}</td>
                        <td><a href="#">{{ $c->client_email }}</a></td>
                        <td>{{ $c->client_phone }}</td>
                        <td class="text-end">
                            <form action="{{ route('clients.destroy', $c) }}" method="POST">
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
    
    </div> <!-- content -->

</body>
</html>