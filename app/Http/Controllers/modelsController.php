<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Makes;

class modelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makes  = Makes::orderBy('name')->get();
        $models = Models::orderBy('make')->get();
        
        return view('createViews.models', [
            'makes'  => $makes,
            'models' => $models,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Models::create($request->all());
        
        $models = Models::get();
        $makes = Makes::get();

        return view('createViews.models', [
            'makes'  => $makes,
            'models' => $models,
        ]);        
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
        echo "Edit";
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo "Update";
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Models $model)
    {
        $model->delete();
        return to_route('models.index');
    }
}
