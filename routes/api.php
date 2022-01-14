<?php

use App\Http\Controllers\Api\PautaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/espacos', [EspacoApiController::class, 'getEspacos']);

Route::get('/pautas',               [PautaApiController::class, 'index']);
Route::get('/pautas/per_page',      [PautaApiController::class, 'per_page']);
Route::get('/pautas/{id}',          [PautaApiController::class, 'show']);
