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
    return view('auth.login');
});

//Route::get('/peliculas','\App\Http\Controllers\PeliculasController@index');
//Route::get('/peliculas/create','\App\Http\Controllers\PeliculasController@create');

Route::resource('peliculas','App\Http\Controllers\PeliculasController')->middleware('auth');
Route::resource('turnos','App\Http\Controllers\TurnosController')->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
