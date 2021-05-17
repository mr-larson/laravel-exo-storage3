<?php

use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $page="home";
    return view('home',compact("page"));
})->name("home");


// Services
Route::resource('service', ServiceController::class);

// Caracteristiques
Route::resource('caracteristique', CaracteristiqueController::class);

// Users
Route::resource('user', UserController::class);
Route::post("user/{id}/download", [UserController::class]);

// portfolio
Route::resource('portfolio', PortfolioController::class);
Route::post("portfolio/{id}/download", [PortfolioController::class]);

// Galerie
Route::resource('galerie', GalerieController::class);
Route::post("galerie/{id}/download", [GalerieController::class]);