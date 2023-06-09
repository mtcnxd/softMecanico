<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Invoices;
use App\Models\Ingresos;

class servicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('services');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createViews.services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Services::create($request->all());

        $invoiceData = Invoices::create([
            'client_id'  => $request->client_id,
            'service_id' => $result->id,
            'status' => 'Pendiente',
            'price'  => $request->price,
        ]);

        return to_route('service');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Services::join('clients','clients.id','=','services.client_id')->where('services.id', $id)->first();
        return view('editViews.services', [
            'serviceInfo' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Services::select('services.*','clients.firstname','clients.lastname','clients.phone')
            ->join('clients','clients.id','=','services.client_id')
            ->where('services.id', $id)
            ->first();
        
        $totalAbonos = 0;
        $abonos = Ingresos::where('invoice_id', $id)->get();
        foreach($abonos as $abono){
            $totalAbonos += $abono->amount;
        }

        $status = ['Pendiente','Refacciones','Finalizado','Entregado'];

        return view('editViews.services', [
            'serviceInfo' => $service,
            'abonosInfo'  => $abonos,
            'totalAbonos' => $totalAbonos,
            'status'      => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $service)
    {
        if($request->status == 'Entregado'){
            Invoices::where('id',$service->id)->update([
                'status' => 'Pagado'
            ]);
        }

        $service->update($request->all());
        return to_route('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
