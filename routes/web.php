<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\makesController;
use App\Http\Controllers\modelsController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\vehiclesController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\calendarController;
use App\Models\Clients;
use App\Models\Makes;
use App\Models\Models;
use App\Models\Vehicles;
use App\Models\Services;
use App\Models\Calendar;
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

Route::resource('vehicles', vehiclesController::class);

Route::resource('calendar', calendarController::class);

Route::get('config', function () {
    $vehicles = Vehicles::select([
            'vehicles.id',
            'models.make',
            'models.name',
            'vehicles.plate',
            'clients.firstname',
            'clients.lastname'
        ])->join('models','models.id','=','vehicles.model_id')
            ->join('clients','clients.id','=','vehicles.client_id')
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

Route::get('ajax/calendar', [
    ajaxController::class,'insertCalendar'
])->name('ajax.calendar');

Route::get('services', function () {
    $services = Services::select([
        'services.id',
        'vehicle',
        'service',
        'status',
        'firstname',
        'lastname',
        'services.created_at',
        'services.updated_at',
        'aprox_price',
        'real_price'
    ])->join('clients','services.client_id','=','clients.id')
        ->get();
        
    return view('services', [
        'services' => $services
    ]);
})->name('service');

Route::get('calendar', function () {
    $calendar = Calendar::where('date','>',Carbon::now())
        ->orderBy('date')
        ->get();

    return view('calendar', [
        'calendar' => $calendar
    ]);
})->name('calendar');


Route::get('reports', function () {
    return view('reports');
})->name('reports');


Route::get('/', function () {
    $clientsCount = Clients::get();
    $services = Services::get();
    $calendar = Calendar::where('status','Pendiente')->where('date','>',Carbon::now())->get();

    foreach ($services as $service) {
        if ($service->status == 'Pendiente'){
            $pendingServices[] = $service->aprox_price;
        }

        if ($service->status == 'Entregado'){
            $totalIngresos[] = $service->real_price;
        }
    }
    
    $totalIngresos = array_sum($totalIngresos);
    
    return view('index', [
        'clientsCount'  => count($clientsCount),
        'ingresosTotal' => number_format($totalIngresos,2),
        'calendarPending' => count($calendar),
        'pendingServices' => count($pendingServices),
    ]);
})->name('index');
