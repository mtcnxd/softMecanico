<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\makesController;
use App\Http\Controllers\modelsController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\searchController;
use App\Models\Clients;
use App\Models\Makes;
use App\Models\Models;
use App\Models\Vehicles;
use App\Models\Services;
use App\Models\Agenda;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('makes', makesController::class);

Route::resource('models', modelsController::class);

Route::resource('clients', clientsController::class);

Route::resource('services', servicesController::class);

Route::get('config', function () {
    $vehicles = Vehicles::join('models','models.id','=','vehicles.vehicle_model_id')
        ->join('clients','clients.id','=','vehicles.vehicle_client_id')
        ->orderBy('vehicles.id','desc')
        ->take(5)
        ->get();

    return view('configuration', [
        'makes'  => Makes::orderBy('id','desc')->take(5)->get(),
        'models' => Models::orderBy('id','desc')->take(5)->get(),
        'vehicles' => $vehicles,
    ]);
})->name('config');

Route::get('clients', function () {
    $clients = Clients::get();
    return view('clients', [
        'clients' => $clients
    ]);
})->name('clients');

Route::get('search/clients', [
    searchController::class, 'searchClients'
])->name('search.clients');

Route::get('search/vehicles', [
    searchController::class, 'searchVehicles'
])->name('search.vehicles');

Route::get('services', function () {
    $services = Services::get();

    return view('services', [
        'services' => $services
    ]);
})->name('service');


Route::get('agenda', function () {
    $calendar = Agenda::where('date','>',Carbon::now())
        ->orderBy('date')
        ->get();

    return view('agenda', [
        'calendar' => $calendar
    ]);
})->name('agenda');


Route::get('reports', function () {
    return view('reports');
})->name('reports');


Route::get('/', function () {
    $clientsCount = Clients::get();
    $services = Services::get();

    foreach ($services as $service) {
        $totalIngresos[] = $service->service_price;
    }

    $totalIngresos = array_sum($totalIngresos);

    return view('index', [
        'clientsCount'  => count($clientsCount),
        'ingresosTotal' => number_format($totalIngresos,2),
    ]);
})->name('index');
