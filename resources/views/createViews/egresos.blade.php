@extends('body')

@section('content')
<div class="div-content">
    <div class="col-md-4">
        @if ( isset($message) )
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Nuevo egreso</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('egresos.store') }}" method="POST">
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Categoria</label>
                        <div class="input-group mb-3">
                            <select type="text" class="form-select" name="category">
                                <option>Gastos fijos</option>
                                <option>Refacciones</option>
                                <option>Prestamos / Anticipos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="text" class="form-control" name="amount">
                    </div>
                    <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="div-content pt-4">
    <div class="col-md-5">
        <div class="card pt-3">
            <div class="row">
                <h5>Modelos</h5>
                <p>Modelos de vehiculos</p>
            </div>
            <table class="table table-hover">
                <tr class="table-header">
                    <td>ID</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>            
</div>    
@endsection
