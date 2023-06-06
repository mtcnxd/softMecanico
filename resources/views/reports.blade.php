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
            <table class="table table-striped" id="services">
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
                $ {{ number_format($totalIngresos) }}
            </div>

        </div>
    </div>
@endsection