@extends('body')

@section('content')
<div class="div-content border-bottom mb-3">
    <div class="row">
        <div class="col-md-6 p-0">
            <h4>Nuevo vehiculo</h4>
        </div>
    </div>
</div>

<div class="div-content">
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7 pl-0">
                <div class="card p-0">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Cliente</label>
                                <select class="form-select" name="client_id">
                                    @foreach ($clients as $c)
                                        <option value="{{ $c->id }}">{{ $c->firstname }} {{ $c->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Modelo</label>
                                <div class="input-group mb-3"   >
                                    <select class="form-select" name="model_id">
                                        @foreach ($models as $m)
                                            <option value="{{ $m->id }}" >{{ $m->make }} {{ $m->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-text" id="basic-addon2">
                                        <a href="{{ route('models.index') }}" class="btn btn-icon">Nuevo</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Placa</label>
                                <input type="text" class="form-control" name="plate">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Color</label>
                                <input type="text" class="form-control" name="color">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-5">
                <div class="card p-0">
                    <div class="card-header">
                        <h5>Información adicional</h5>
                    </div>
    
                    <div class="card-body">
                        <label class="form-label">Comentarios</label>
                        <textarea class="form-control" name="comment"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form> 
</div>
@endsection

