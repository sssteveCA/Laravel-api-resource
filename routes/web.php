<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('/form')->group(function(){
    
    Route::get('/get',function(){
        return view('form/get');
    });
    
    Route::get('/createp',function(){
        return view('form/createp');
    });
    
    Route::get('/edit',function(){
        return view('form/edit');
    });
    
    Route::get('/delete',function(){
        return view('form/delete');
    });
});//Route::prefix('/form')->group(function(){


Route::prefix('/error')->group(function(){
    //Richiesta errata
    Route::get('/400',function(){
        return view('error/400');
    });

    //Risorsa non trovata
    Route::get('/404',function(){
        return view('error/404');
    });
});

//Route::resource('form',FormController::class);
Route::resource('personas',PersonaController::class);

Route::get('/personas',[PersonaController::class,'index']);
Route::get('/json/personas',[PersonaController::class,'indexJson']);
Route::get('/personas/{id}',[PersonaController::class,'show']);
Route::get('/json/personas/{id}',[PersonaController::class,'showJson']);
Route::post('/personas',[PersonaController::class,'store']);
Route::post('/json/personas',[PersonaController::class,'storeJson']);
Route::put('/personas/{id}',[PersonaController::class,'update']);
Route::put('/json/personas/{id}',[PersonaController::class,'updateJson']);
Route::delete('/personas/{id}',[PersonaController::class,'destroy']);
Route::delete('/json/personas/{id}',[PersonaController::class,'destroyJson']);
