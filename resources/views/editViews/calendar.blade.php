@extends('body')

@section('content')
<div class="div-content">
    <div class="col-md-7">
        <div class="card p-0">
            <div class="card-header">
                <h5>Editar evento</h5>
            </div>

            <div class="card-body">
                <form class="form-floating row g-3" action="{{ route('calendar.update', $calendarInfo) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="title" value="{{ $calendarInfo->title }}">
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="date" value="{{ $calendarInfo->date }}">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Comentario</label>
                        <textarea class="form-control" name="comment">{{ $calendarInfo->comment }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            @foreach ($statusList as $status)
                                @if ($calendarInfo->status == $status)
                                    <option selected>{{ $status }}</option>
                                @else
                                    <option>{{ $status }}</option>
                                @endif
                            @endforeach
                        </select>
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