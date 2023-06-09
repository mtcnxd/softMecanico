<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingresos;
use App\Models\Invoices;

class ajaxController extends Controller
{
    public function insertAbono(Request $request)
    {
        $date   = $request->input('date');
        $amount = $request->input('amount');
        $invoice_id = $request->input('invoice_id');

        Ingresos::create($request->all());

        $result = Invoices::where('id', $invoice_id)->update([
            'status' => 'Abono'
        ]);

        return $result;
    }
}
