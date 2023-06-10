@extends('body')

@section('content')
<div class="div-content pb-2 mb-2">
    <div class="row">
        <div class="col-md-6">
            <h4>Facturas</h4>
            <span class="text-muted">Facturas de servicios</span>
        </div>
    </div>
</div>

<div class="div-content pb-4">
    <div class="card">
        {{ $invoice->status }}
    </div>
</div>
@endsection