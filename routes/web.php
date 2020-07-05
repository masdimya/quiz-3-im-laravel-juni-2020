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
    return view('pages.index');
});

Route::get('/artikel'          , 'ArtikelController@index')    ->name('artikel.index');
Route::get('/artikel/create'   , 'ArtikelController@addForm')  ->name('artikel.add-form');
Route::post('/artikel'         , 'ArtikelController@store')    ->name('artikel.add');
Route::get('/artikel/{id}'     , 'ArtikelController@detail')   ->name('artikel.detail');
Route::get('/artikel/{id}/edit', 'ArtikelController@editForm') ->name('artikel.edit-form');
Route::delete('/artikel/{id}'  , 'ArtikelController@destroy')  ->name('artikel.delete');
Route::put('/artikel/{id}'      , 'ArtikelController@update')  ->name('artikel.edit');






Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit