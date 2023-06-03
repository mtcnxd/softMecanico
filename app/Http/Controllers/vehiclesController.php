<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Clients;
use App\Models\Vehicles;
use App\Models\Makes;

class vehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Models::orderBy('make','asc')->get();
        $clients = Clients::orderBy('firstname')->get();

        return view('createViews.vehicle', [
            'clients' => $clients,
            'models'  => $models,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = Models::orderBy('make','asc')->get();
        $clients = Clients::orderBy('firstname')->get();

        return view('createViews.vehicle', [
            'clients' => $clients,
            'models'  => $models,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vehicles::create($request->all());

        return to_route('config'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Vehicles $vehicle)
    {
        $vehicle->delete();
        return to_route('config');
    }
}
