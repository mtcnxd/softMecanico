<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Vehicles;
use App\Models\Models;

class searchController extends Controller
{
    public function searchClients(Request $request){
        $data = array();
        $term = $request->get('term');
        $results = Clients::where('client_firstname','LIKE','%'.$term.'%')
            ->orWhere('client_lastname','LIKE','%'.$term.'%')->limit(5)->get();

        foreach ($results as $result){
            $data[] = [
                "id"    => $result->id,
                "name"  => $result->client_firstname ." ". $result->client_lastname,
                "phone" => $result->client_phone
            ];
        }

        return $data;
    }

    public function searchVehicles(Request $request){
        $data = array();
        $clientid = $request->get('term');
        $results = Vehicles::join('models','models.id','=','vehicles.vehicle_model_id')
            ->where('vehicle_client_id', $clientid)->get();

        foreach($results as $result){
            $data[] = [
                "id"    => $result->id,
                "plate" => $result->model_make." ".$result->model_name,
            ];
        }

        return $data;
    }
}
