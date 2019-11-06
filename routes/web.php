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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', function () {
//     return view('pages.index');
// })->name('home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/tagihan/datapelanggan', 'TagihanController@datapelanggan')->name('tagihan.datapelanggan');

Route::get('/tagihan/pembayaran/{id}', 'TagihanController@pembayaran')->name('tagihan.pembayaran');
Route::post('/tagihan/pembayaran/{id}', 'TagihanController@storepembayaran')->name('tagihan.pembayaran.store');




// Route::get('/tagihan/store', 'TagihanController@store')->name('tagihan.store');

Route::resource('pelanggan', 'PelangganController');
Route::resource('harga', 'HargaController');
Route::resource('tagihan', 'TagihanController')->except(['datapelanggan']);
Route::resource('laporan', 'laporanController');
