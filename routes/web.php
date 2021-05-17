<?php

use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Services
Route::resource('service', ServiceController::class);

// Caracteristiques
Route::resource('caracteristique', CaracteristiqueController::class);