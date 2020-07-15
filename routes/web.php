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

Auth::routes();

Route::get('/', function () {
    return view('admin.dashboard');
}) ->middleware('auth');

Route::get('/inner-join','KelahiranController@innerJoinClause');
//CRUD-Data-Warga
Route::get('data-pengguna', 'PenggunaController@index')->name('pengguna.index');
Route::get('data-pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::post('data-pengguna/store', 'PenggunaController@store')->name('pengguna.store');
Route::get('data-pengguna/edit/{id}', 'PenggunaController@edit');
Route::get('data-pengguna/delete/{id}', 'PenggunaController@destroy');
Route::post('data-pengguna/update/{id}', 'PenggunaController@update');

Route::resource('datawarga', 'WargaController');

Route::get('/datapengguna', 'AdminController@datapengguna');


//CRUD-SKTM-Sekolah
Route::get('suket-tidakmampu-sekolah', 'SKTMSekolahController@index')->name('sktmsekolah.index');
Route::get('suket-tidakmampu-sekolah/create', 'SKTMSekolahController@create')->name('sktmsekolah.create');
Route::post('suket-tidakmampu-sekolah/store', 'SKTMSekolahController@store')->name('sktmsekolah.store');

Route::get('suket-tidakmampu-sekolah/cari', 'SKTMSekolahController@ajax_select')->name('sktmsekolah.ajax_select');

Route::get('suket-tidakmampu-sekolah/edit/{id}', 'SKTMSekolahController@edit');
Route::get('suket-tidakmampu-sekolah/delete/{id}', 'SKTMSekolahController@destroy');
Route::post('suket-tidakmampu-sekolah/update/{id}', 'SKTMSekolahController@update');

//CRUD-SKTM-RS
Route::get('suket-sktmrs', 'SKTMRSController@index')->name('sktmrs.index');
Route::get('suket-sktmrs/create', 'SKTMRSController@create')->name('sktmrs.create');
Route::post('suket-sktmrs/store', 'SKTMRSController@store')->name('sktmrs.store');
Route::get('suket-sktmrs/edit/{id}', 'SKTMRSController@edit');
Route::get('suket-sktmrs/delete/{id}', 'SKTMRSController@destroy');
Route::post('suket-sktmrs/update/{id}', 'SKTMRSController@update');

//CRUD-Suket_kelahiran
Route::get('suket-kelahiran', 'KelahiranController@index')->name('kelahiran.index');
Route::get('suket-kelahiran/create', 'KelahiranController@create')->name('kelahiran.create');
Route::post('suket-kelahiran/store', 'KelahiranController@store')->name('kelahiran.store');
Route::get('suket-kelahiran/edit/{id}', 'KelahiranController@edit');
Route::get('suket-kelahiran/delete/{id}', 'KelahiranController@destroy');
Route::post('suket-kelahiran/update/{id}', 'KelahiranController@update');

//CRUD-Suket-KTP Sementara
Route::get('suket-ktp-sementara', 'KTPSementaraController@index')->name('ktp.index');
Route::get('suket-ktp-sementara/create', 'KTPSementaraController@create')->name('ktp.create');
Route::post('suket-ktp-sementara/store', 'KTPSementaraController@store')->name('ktp.store');
Route::get('suket-ktp-sementara/edit/{id}', 'KTPSementaraController@edit');
Route::get('suket-ktp-sementara/delete/{id}', 'KTPSementaraController@destroy');
Route::post('suket-ktp-sementara/update/{id}', 'KTPSementaraController@update');

//CRUD-Suket-Usaha
Route::get('suket-usaha', 'UsahaController@index')->name('usaha.index');
Route::get('suket-usaha/create', 'UsahaController@create')->name('usaha.create');
Route::post('suket-usaha/store', 'UsahaController@store')->name('usaha.store');
Route::get('suket-usaha/edit/{id}', 'UsahaController@edit');
Route::get('suket-usaha/delete/{id}', 'UsahaController@destroy');
Route::post('suket-usaha/update/{id}', 'UsahaController@update');



Route::get('/home', 'HomeController@index')->name('home');

