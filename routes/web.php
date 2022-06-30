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

//Modelo Resumido inserindo o use Contorller
//Route::get('/imoveis',[PropertyController::class,'index']);
