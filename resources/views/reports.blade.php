@extends('body')

@section('content')
    <div class="div-content border-bottom pb-2 mb-4">
        <div class="col-md-6">
            <h3>Reportes</h3>
            <span class="text-muted">Detalle de movimientos del mes en curso</span>
        </div>
    </div>

    <div class="div-content">
        <div class="card p-4">
            <table class="table table-striped" id="mytable">
                <thead>
                    <tr class="table-header">
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th class="text-end">Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($egresos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->date }}</td>
                            <td class="text-end">$ {{ number_format($item->amount, 2) }}</td>
                        </tr>
                    @endforeach
                    @foreach ($ingresos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->service }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="text-end">$ {{ number_format($item->real_price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-4 text-center p-2">
                    <div class="card-transparent card-stats-2">
                        Total ingresos: 
                        $ {{ number_format($totalIngresos,2) }}
                    </div>
                </div>
                <div class="col-md-4 text-center p-2">
                    <div class="card-transparent card-stats-2">
                        Total egresos: 
                        $ {{ number_format($totalEgresos,2) }}
                    </div>
                </div>
                <div class="col-md-4 text-center p-2">
                    <div class="card-transparent card-stats-2">
                        Balance: 
                        $ {{ number_format($totalIngresos - $totalEgresos,2) }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@include('includes.datatable')
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
@endsection
