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

Route::get('/login', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tagihan/datapelanggan', 'TagihanController@datapelanggan')->name('tagihan.datapelanggan');
// Route::get('/tagihan/store', 'TagihanController@store')->name('tagihan.store');

Route::resource('pelanggan', 'PelangganController');
Route::resource('harga', 'HargaController');
Route::resource('tagihan', 'TagihanController')->except([
    'datapelanggan'
]);

