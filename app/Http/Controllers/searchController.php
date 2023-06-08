<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Vehicles;
use App\Models\Services;
use App\Models\Models;

class searchController extends Controller
{
    public function searchClients(Request $request){
        $data = array();
        $term = $request->get('term');
        $results = Clients::where('firstname','LIKE','%'.$term.'%')
            ->orWhere('lastname','LIKE','%'.$term.'%')->limit(5)->get();

        foreach ($results as $result){
            $data[] = [
                "id"    => $result->id,
                "name"  => $result->firstname ." ". $result->lastname,
                "phone" => $result->phone
            ];
        }

        return $data;
    }

    public function searchVehicles(Request $request){
        $data = array();
        $clientid = $request->get('term');
        $results = Vehicles::join('models','models.id','=','vehicles.model_id')
            ->where('client_id', $clientid)->get();

        foreach($results as $result){
            $data[] = [
                "id"    => $result->id,
                "plate" => $result->make." ".$result->name,
            ];
        }

        return $data;
    }

    public function searchServices(Request $request){
        $results = array();
        $clientid = $request->get('clientid');
        $clientvehicle = $request->get('clientvehicle');

        $results = Services::where('client_id', $clientid)
            ->where('vehicle',$clientvehicle)
            ->get();

        return $results;
    }
}
