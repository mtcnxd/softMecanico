<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\makesController;
use App\Http\Controllers\modelsController;
use App\Models\Makes;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('config', function () {
    $makes = Makes::orderBy('id', 'desc')->take(5)->get();

    return view('configuration', [
        'makes' => $makes
    ]);
})->name('config');

Route::get('services', function () {
    return view('services');
})->name('service');

Route::get('agenda', function () {
    return view('agenda');
})->name('agenda');

Route::resource('makes', makesController::class);

Route::resource('models', modelsController::class);