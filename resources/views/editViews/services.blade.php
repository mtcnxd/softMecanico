@extends('body')

@section('content')
    <div class="div-content mb-4">
        <h3>Servicios</h3>
        <div class="col-md-6">
            <span class="text-muted">Resumen de movimientos de la semana en curso</span>
        </div>
    </div>

    <div class="div-content">
        <div class="row mb-4">
            <div class="col-md-6 row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Cliente</label>
                            <input type="text" class="form-control" name="client_name" id="client_name" value="{{$serviceInfo->firstname." ".$serviceInfo->lastname}}" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$serviceInfo->phone}}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Marca de automovil</label>
                            <input type="text" class="form-control" name="vehicle" id="vehicle" value="{{ $serviceInfo->vehicle }}" disabled>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Kilometraje</label>
                            <input type="text" class="form-control" name="mileage" value="{{ $serviceInfo->mileage }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row mb-4">
            <div class="row">
                <div class="card-transparent">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <label class="form-label">Servicio</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="service" value="{{ $serviceInfo->service }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Comentarios</label>
                            <textarea class="form-control" name="comment" disabled>{{ $serviceInfo->description }}</textarea>
                            <input type="hidden" name="status" value="Pendiente">
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>  

    <form action="{{ route('services.update', $serviceInfo) }}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-md-12 div-content pb-4">
            <div class="row">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-4">
                            <label class="form-label">Importe</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $serviceInfo->price }}">
                                <span class="input-group-text" id="basic-addon2">
                                    <a href="#" id="abono" class="btn btn-icon">Abono</a>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Saldo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" value="{{ $serviceInfo->price - $totalAbonos }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                @foreach ($status as $item)
                                    @if ($serviceInfo->status == $item)
                                        <option selected>{{ $item }}</option>
                                    @else 
                                        <option>{{ $item }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Comentarios</label>
                            <textarea class="form-control" name="comment">{{ $serviceInfo->comment }}</textarea>
                        </div>
    
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
@endsection

<div class="modal fade" id="modalAbonos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card rounded border border-custom shadow-sm">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Abono</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Lista de abonos</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <form id="formCreateAbono">
                                    @csrf
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Fecha del abono: </label>
                                        <input type="date" class="form-control" name="date" id="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Importe del abono: </label>
                                        <input type="text" class="form-control" name="amount" id="amount">
                                        <input type="hidden" name="invoice_id" id="service_id" value="{{ $serviceInfo->id }}">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Guardar" class="btn btn-primary" id="saveAbono">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th class="text-end">Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($abonosInfo as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td class="text-end">$ {{ number_format($item->amount,2) }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="border-0">&nbsp;</td>
                                            <td class="border-0">&nbsp;</td>
                                            <td class="border-0 text-end fw-semibold">$ {{ number_format($totalAbonos,2) }}</td>
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
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function(){
        $("#abono").on('click', function(button){
            button.preventDefault()
            $("#modalAbonos").modal('show')
        })

        $("#formCreateAbono").submit(function(form){
            form.preventDefault()
            var form = $(this)
            var datos = form.serialize()

            $.ajax({
                url:'{{route('insert.abono')}}',
                method: 'POST',
                dataType: 'json',
                data: datos,
                success:function(response){
                    console.log(response)
                    $("#modalAbonos").modal('hide')
                },
                error:function(error){
                    console.log(error)
                    $("#modalAbonos").modal('hide')
                }
            })
        })
    })
</script>
@endsection