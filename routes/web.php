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
    URL::forceScheme('https');
    URL::forceRootUrl($proxy_url);
}

// Route::get('/login', function () {
//     return view('welcome');
// });

Route::get('api/tagihan', 'ApiController@tagihan')->name('api.tagihan');
Route::get('api/laporan', 'ApiController@laporan')->name('api.laporan');
Route::post('api/create_tagihan', 'ApiController@create_tagihan')->name('api.create.tagihan');
Route::post('api/login', 'ApiController@login')->name('api.login');
Route::post('api/login_user', 'ApiController@login_user')->name('api.login.user');

Route::get('api/pelanggan_all', 'ApiController@pelanggan_all')->name('api.pelanggan.all');
Route::get('api/pelanggan/{id}', 'ApiController@pelanggan')->name('api.pelanggan');
Route::get('api/pelanggan/rekening/{rekening}', 'ApiController@pelanggan_by_rekening')->name('api.pelanggan.rekening');
Route::get('api/laporan/{id_pelanggan}', 'ApiController@laporan_user')->name('api.laporan.pelanggan');
Route::get('api/tagihan/{id_pelanggan}', 'ApiController@tagihan_user')->name('api.laporan.tagihan');
Route::get('api/grafik', 'ApiController@grafik')->name('api.tagihan.grafik');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', function () {
//     return view('pages.index');
// })->name('home');


Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/tagihan/datapelanggan', 'TagihanController@datapelanggan')->name('tagihan.datapelanggan');

Route::get('/tagihan/pembayaran/{id}', 'TagihanController@pembayaran')->name('tagihan.pembayaran');
Route::post('/tagihan/pembayaran/asw/{id}', 'TagihanController@storepembayaran')->name('tagihan.pembayaran.store.asw');

// Route::get('/datapribadi','PelangganCOntroller@datapribadi');


// Route::get('/tagihan/store', 'TagihanController@store')->name('tagihan.store');

Route::resource('pelanggan', 'PelangganController');
Route::resource('harga', 'HargaController');
Route::resource('tagihan', 'TagihanController')->except(['datapelanggan']);
Route::resource('laporan', 'LaporanController');

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
