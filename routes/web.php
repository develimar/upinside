<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PropertyController;

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
    return view('welcome');
});

//modelo antigo usado
//Route::get('/imoveis', 'PropertyController@index');


//Modelo informado pelo laravel para usar
Route::get('/imoveis', [\App\Http\Controllers\PropertyController::class,'index']);

// Rota mostrar formulario cadastro
Route::get('/imoveis/novo', [\App\Http\Controllers\PropertyController::class, 'create']);
Route::post('/imoveis/store', [\App\Http\Controllers\PropertyController::class, 'store']);
Route::get('/imoveis/{uname}', [\App\Http\Controllers\PropertyController::class, 'show']);

Route::get('/imoveis/editar/{uname}', [\App\Http\Controllers\PropertyController::class, 'edit']);
Route::put('/imoveis/update/{uname}', [\App\Http\Controllers\PropertyController::class, 'update']);

Route::get('/imoveis/remover/{uname}', [\App\Http\Controllers\PropertyController::class, 'destroy']);




//Modelo Resumido inserindo o use Contorller
//Route::get('/imoveis',[PropertyController::class,'index']);
