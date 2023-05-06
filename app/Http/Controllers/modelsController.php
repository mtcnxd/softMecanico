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
        $makes  = Makes::get();
        $models = Models::join('makes','model_make','=','makes.id')
            ->get();
        
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
        
        $makes  = Makes::get();
        $models = Models::join('makes','model_make','=','makes.id')
            ->get();

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
    public function destroy(Models $model)
    {
        $model->delete();
        return to_route('models.index');
    }
}
