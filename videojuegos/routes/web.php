<?php

use App\Http\Controllers\ConsolasController;
use App\Http\Controllers\videojuegoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consolas/info', function () {
    return view('consolas/info');
});

Route::get('/consolas',
    [ConsolasController::class, 'index']);

Route::get('/consolas/create',
    [ConsolasController::class, 'create']);

Route::get('/videojuegos/index',[
    videojuegoController::class,'index']);

Route::get('/videojuegos/create',[
    videojuegoController::class,'create']);










