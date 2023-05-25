@extends('body')

@section('content')
    <div class="row pt-4">
        <div class="col-md-4">
            @if ( isset($message) )
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Crear nuevo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('models.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">Marca de automovil</label>
                            <div class="input-group mb-3"   >
                                <select type="text" class="form-select" name="make">
                                    @foreach ($makes as $m)
                                        <option value="{{ $m->name }}" >{{ $m->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-text" id="basic-addon2">
                                    <a href="{{ route('makes.index') }}" class="btn btn-icon">Crear</a>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Modelo de automovil</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <input type="submit" class="btn btn-sm btn-primary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-4">
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
                    @foreach ($models as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->make }}</td>
                        <td>{{ $m->name }}</td>
                        <td class="text-end">
                            <form action="{{ route('models.destroy', $m->id) }}" method="POST">
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
@endsection
