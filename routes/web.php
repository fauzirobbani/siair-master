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

$proxy_url = getenv('PROXY_URL');

if (!empty($proxy_url)) {
    URL::forceRootUrl($proxy_url);
}

// Route::get('/login', function () {
//     return view('welcome');
// });

Route::get('api/tagihan', 'ApiController@tagihan')->name('api.tagihan');
Route::get('api/laporan', 'ApiController@laporan')->name('api.laporan');
Route::post('api/create_tagihan', 'ApiController@create_tagihan')->name('api.create.tagihan');
Route::post('api/login', 'ApiController@login')->name('api.login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', function () {
//     return view('pages.index');
// })->name('home');


Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/tagihan/datapelanggan', 'TagihanController@datapelanggan')->name('tagihan.datapelanggan');

Route::get('/tagihan/pembayaran/{id}', 'TagihanController@pembayaran')->name('tagihan.pembayaran');
Route::post('/tagihan/pembayaran/{id}', 'TagihanController@storepembayaran')->name('tagihan.pembayaran.store');

// Route::get('/datapribadi','PelangganCOntroller@datapribadi');


// Route::get('/tagihan/store', 'TagihanController@store')->name('tagihan.store');

Route::resource('pelanggan', 'PelangganController');
Route::resource('harga', 'HargaController');
Route::resource('tagihan', 'TagihanController')->except(['datapelanggan']);
Route::resource('laporan', 'laporanController');

Route::group(['middleware' => ['auth']], function(){

// Registration Routes...
Route::get('/newuser', 'RegisterController@form')->name('newuser');
Route::post('/newuser', 'RegisterController@create');

// Registration Routes...
Route::get('/newpelanggan', 'RegisterController@formpelanggan')->name('newpelanggan');
Route::post('/newpelanggan', 'RegisterController@createpelanggan');

Route::get('/user', 'AdminController@index')->name('user');

//user
Route::get('/datapribadi', 'User\DataPribadiController@index')->name('datapribadi');
Route::get('/datapribadi/edit/{id}', 'User\DataPribadiController@edit')->name('datapribadi.edit');
Route::post('/datapribadi/edit/{id}', 'User\DataPribadiController@update')->name('datapribadi.edit.store');


Route::get('user/tagihan', 'User\TagihanController@index')->name('user.tagihan');

Route::get('user/laporan', 'User\LaporanController@index')->name('user.laporan');


});
