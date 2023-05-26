<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class calendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createViews.calendar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Calendar::create($request->all());
        return to_route('calendar');
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
        $statusList = ['Cancelado','Finalizado','Pendiente'];

        return view('editViews.calendar', [
            'calendarInfo' => Calendar::where('id', $id)->first(),
            'statusList' => $statusList
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {   
        $calendar->update($request->all());
        return to_route('calendar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
