<?php

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
    return view('welcome');
});

Route::post('/prova', 'App\Http\Controllers\GerarProvaController@gerarProva');
Route::post('/salvarprova', 'App\Http\Controllers\GerarProvaController@salvaProva');

Route::get('/perguntas', function() {
    return view('perguntas');
});

Route::post('/perguntas', 'App\Http\Controllers\PerguntasController@store');
Route::post('/respostas', 'App\Http\Controllers\GeraProvaController@salvaProva');
