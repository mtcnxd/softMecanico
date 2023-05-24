<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makes;

class makesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makes = Makes::get();
        
        return view('createViews.makes', [
            'makes' => $makes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "create make controller";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exist = Makes::where('name', $request->name)->first();

        if(!$exist) {
            Makes::create($request->all());
            $message = 'Registro guardado con exito!';
            $error = false;
        } else {
            $message = 'El registro ya existe!';
            $error = true;
        }

        $makes = Makes::get();
    
        return view('createViews.makes', [
            'message' => $message,
            'makes'   => $makes,
            'error'   => $error,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "Show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "Edith";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo "Update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Makes $make)
    {
        $make->delete();
        return to_route('makes.index');
    }
}
