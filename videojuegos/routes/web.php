<?php

use App\Http\Controllers\ConsolasController;
use App\Http\Controllers\videojuegoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniasController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/videojuegos/search', [videojuegoController::class, 'search']) -> name('videojuegos.search');
    
Route::resource('videojuegos', videojuegoController::class);

Route::resource('companias', CompaniasController::class);

Route::resource('consolas', ConsolasController::class);










