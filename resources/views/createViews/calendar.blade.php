@extends('body')

@section('content')
    <div class="row pt-4">
        <div class="col-md-7">
            <div class="card shadow p-0">
                <div class="card-header">
                    <h5>Crear evento</h5>
                </div>
                <div class="card-body">
                    <form class="form-floating row g-3" action="{{ route('calendar.store') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-md-12">
                            <label for="inputPassword4" class="form-label">Comentario</label>
                            <textarea class="form-control" name="comment"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>    
@endsection