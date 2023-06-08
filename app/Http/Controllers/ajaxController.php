<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresos;

class ajaxController extends Controller
{
    public function insertAbono(Request $request)
    {
        $date   = $request->input('date');
        $amount = $request->input('amount');
        $service_id = $request->input('service_id');

        Ingresos::create($request->all());

        return "Created success!";
    }
}
