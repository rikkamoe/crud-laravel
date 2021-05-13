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

Route::get('/', 'PagesController@index');
Route::get('/input', 'PagesController@input');
Route::post('/input', 'PagesController@store');
Route::delete('/{id}', 'PagesController@destroy')->name('barang.destroy');
Route::get('/{id}', 'PagesController@edit');
Route::post('/{id}/update','PagesController@update');

