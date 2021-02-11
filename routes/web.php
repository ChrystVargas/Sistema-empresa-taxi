<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta de cliente
Route::get('cliente', 'ClienteController@index')->name('cliente.index');
Route::post('cliente', 'ClienteController@insertar')->name('cliente.insertar');
Route::get('cliente/eliminar/{id?}', 'ClienteController@eliminar')->name('cliente.eliminar');
Route::get('cliente/editar/{id?}', 'ClienteController@editar')->name('cliente.editar');
Route::post('cliente/actualizar', 'ClienteController@actualizar')->name('cliente.actualizar');

//Ruta de conductor
Route::get('conductor', 'ConductorController@index')->name('conductor.index');
Route::post('conductor', 'ConductorController@insertar')->name('conductor.insertar');
Route::get('conductor/eliminar/{id?}', 'ConductorController@eliminar')->name('conductor.eliminar');
Route::get('conductor/editar/{id?}', 'ConductorController@editar')->name('conductor.editar');
Route::post('conductor/actualizar', 'ConductorController@actualizar')->name('conductor.actualizar');
