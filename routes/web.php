<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;

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
    return view('home');
});

Route::get('/listeClient',  [\App\Http\Controllers\ClientController::class, 'getclient']);

Route::get('/topdix',  [\App\Http\Controllers\ClientController::class, 'getTopApplications']);

Route::get('/topCinq',  [\App\Http\Controllers\ClientController::class, 'getproduits']);

Route::get('/topCinqEvo',  [\App\Http\Controllers\ClientController::class, 'getProductVolumes']);


