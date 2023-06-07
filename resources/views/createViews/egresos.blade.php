@extends('body')

@section('content')
<div class="div-content">
    <div class="row">
        <div class="col-md-4">
            @if ( isset($message) )
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
    
            <div class="card shadow-sm">
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

        <div class="col">
            <div class="card rounded border border-custom shadow-sm mb-4">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Egresos</button>
                          </li>
                          <li class="nav-item">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Ingresos</button>
                          </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <p class="fs-7 fw-bolder text-uppercase text-muted">Listado de egresos del mes</p>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-header">
                                        <td>Categoria</td>
                                        <td>Descripcion</td>
                                        <td>Fecha</td>
                                        <td>Importe</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($egresos as $item)
                                    <tr>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>$ {{ number_format($item->amount, 2) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <p class="fs-7 fw-bolder text-uppercase text-muted">Listado de ingresos del mes</p>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>Descripcion</td>
                                        <td>Fecha</td>
                                        <td class="text-end">Importe</td>
                                        <td class="text-end"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
