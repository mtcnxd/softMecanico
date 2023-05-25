<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

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
        Services::create($request->all());
        
        return to_route('service');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $serviceInfo = Services::where('id',$id)->first();

        return view('editViews.services', [
            'serviceInfo' => $serviceInfo
        ]);
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
    public function destroy(string $id)
    {
        //
    }
}
