<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Services;
use App\Models\Vehicles;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::get();

        return view('createViews.clients', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createViews.clients');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Clients::create($request->all());
        return to_route('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clientInfo = Clients::find($id);

        $serviceInfo = Services::where('client_id', $id)->get();
        $vehiclesInfo = Vehicles::join('models','model_id','=','models.id')
            ->where('client_id',$id)
            ->get();

        return view('clientsinfo', [
            'clientInfo'  => $clientInfo,
            'serviceInfo' => $serviceInfo,
            'vehiclesInfo' => $vehiclesInfo,
            'client_id'    => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        return to_route('clients');
    }
}
