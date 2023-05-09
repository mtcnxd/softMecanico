<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\makesController;
use App\Http\Controllers\modelsController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\servicesController;
use App\Models\Clients;
use App\Models\Makes;
use App\Models\Models;

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
    $makes  = Makes::orderBy('id', 'desc')->take(5)->get();
    $models = Models::select('models.id','makes.make_name','models.model_name')
        ->join('makes','model_make','=','makes.id')
        ->take(5)
        ->get();

    return view('configuration', [
        'makes'  => $makes,
        'models' => $models,
    ]);
})->name('config');

Route::get('clients', function () {
    $clients = Clients::get();
    return view('clients', [
        'clients' => $clients
    ]);
})->name('clients');


Route::get('services', function () {
    return view('services');
})->name('service');


Route::get('agenda', function () {
    return view('agenda');
})->name('agenda');


Route::get('reports', function () {
    return view('reports');
})->name('reports');


Route::get('/', function () {
    return view('index');
})->name('index');
