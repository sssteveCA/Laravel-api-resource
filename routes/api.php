<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/personas',[PersonaController::class,'indexJson']);
Route::get('/personas/{id}',[PersonaController::class,'showJson']);
Route::post('/personas',[PersonaController::class,'storeJson']);
Route::put('/personas/{id}',[PersonaController::class,'updateJson']);
Route::delete('/personas/{id}',[PersonaController::class,'destroyJson']);

