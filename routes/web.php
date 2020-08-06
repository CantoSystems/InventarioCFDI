<?php

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

Route::resource('/inventario', 'InventarioController');
Route::get('/importarxml', 'InventarioController@importarxml')->name('importarxml');
Route::get('/importarexcel','InventarioController@importarexcel')->name('importarexcel');
Route::post('/tratamientoxml','InventarioController@tratamientoxml')->name('tratamientoxml');
Route::post('/tratamientoexcel','InventarioController@tratamientoexcel')->name('tratamientoexcel');
Route::post('import', 'InventarioController@import')->name('import');
Auth::routes();
Route::get('/exportarexcel', 'InventarioController@exportarexcel')->name('exportarexcel');
Route::get('export', 'InventarioController@export')->name('export');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/limpiarbase','InventarioController@limpiarbase')->name('limpiarbase');

Auth::routes();
