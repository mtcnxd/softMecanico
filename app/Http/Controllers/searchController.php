<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class searchController extends Controller
{
    public function searchClients(Request $request){
        $data = array();
        $term = $request->get('term');
        $results = Clients::where('client_firstname','LIKE','%'.$term.'%')
            ->orWhere('client_lastname','LIKE','%'.$term.'%')->get();

        foreach ($results as $result){
            $data[] = $result->client_firstname ." ". $result->client_lastname;
        }

        return $data;
    }
}
