@extends('body')

@section('content')
    <div class="div-content pb-2 mb-2">
        <div class="row">
            <div class="col-md-6">
                <h4>Facturas</h4>
                <span class="text-muted">Facturas de servicios</span>
            </div>
            <div class="col text-end">
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Menu</button>
                    <ul class="dropdown-menu shadow">
                        <li><a href="{{ route('services.create') }}" class="dropdown-item">Nuevo servicio</a></li>
                        <li><a href="{{ route('egresos.create') }}" class="dropdown-item">Nuevo egreso</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="div-content pb-4">
        <div class="card">
            <table class="table table-hover table-borderless" id="mytable">
                <thead>
                    <tr class="table-header">
                        <th width="70px">Factura</th>
                        <th>Servicio</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th class="text-end">Importe</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td><a href="{{ route('services.edit', $invoice->service_id) }}">#{{ $invoice->service_id }}</a></td>
                        <td>{{ $invoice->firstname ." ". $invoice->lastname }}</td>
                        <td>{{ $invoice->created_at }}</td>
                        <td><span class="span-{{ strtolower($invoice->status) }}">{{ $invoice->status }}</span></td>
                        <td class="text-end fw-semibold">{{ '$'.number_format($invoice->price,2) }}</td>
                        <td class="text-end">
                            <a href="{{ url('viewInvoice', ["invoice"=>$invoice]) }}"><x-feathericon-eye style="height:20px"/></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
