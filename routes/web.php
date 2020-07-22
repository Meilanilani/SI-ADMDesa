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
Route::get('suket-tidakmampu-rumahsakit', 'SKTMRSController@index')->name('sktmrs.index');
Route::get('suket-tidakmampu-rumahsakit/create', 'SKTMRSController@create')->name('sktmrs.create');
Route::post('suket-tidakmampu-rumahsakit/store', 'SKTMRSController@store')->name('sktmrs.store');

Route::get('suket-tidakmampu-rumahsakit/cari', 'SKTMRSController@ajax_select')->name('sktmrs.ajax_select');

Route::get('suket-tidakmampu-rumahsakit/edit/{id}', 'SKTMRSController@edit');
Route::get('suket-tidakmampu-rumahsakit/delete/{id}', 'SKTMRSController@destroy');
Route::post('suket-tidakmampu-rumahsakit/update/{id}', 'SKTMRSController@update');

//CRUD-Suket_kelahiran
Route::get('suket-kelahiran', 'KelahiranController@index')->name('kelahiran.index');
Route::get('suket-kelahiran/create', 'KelahiranController@create')->name('kelahiran.create');
Route::post('suket-kelahiran/store', 'KelahiranController@store')->name('kelahiran.store');
Route::get('suket-kelahiran/edit/{id}', 'KelahiranController@edit');
Route::get('suket-kelahiran/delete/{id}', 'KelahiranController@destroy');
Route::post('suket-kelahiran/update/{id}', 'KelahiranController@update');
Route::get('suket-kelahiran/cari', 'KelahiranController@ajax_select')->name('kelahiran.ajax_select');


//CRUD-Suket-KTP Sementara
Route::get('suket-ktp-sementara', 'KTPSementaraController@index')->name('ktp.index');
Route::get('suket-ktp-sementara/create', 'KTPSementaraController@create')->name('ktp.create');
Route::post('suket-ktp-sementara/store', 'KTPSementaraController@store')->name('ktp.store');

Route::get('suket-ktp-sementara/cari', 'KTPSementaraController@ajax_select')->name('ktp.ajax_select');
Route::get('suket-ktp-sementara/edit/{id}', 'KTPSementaraController@edit');
Route::get('suket-ktp-sementara/delete/{id}', 'KTPSementaraController@destroy');
Route::post('suket-ktp-sementara/update/{id}', 'KTPSementaraController@update');

//CRUD-Suket-Usaha
Route::get('suket-usaha', 'UsahaController@index')->name('usaha.index');
Route::get('suket-usaha/create', 'UsahaController@create')->name('usaha.create');
Route::post('suket-usaha/store', 'UsahaController@store')->name('usaha.store');

Route::get('suket-usaha/cari', 'UsahaController@ajax_select')->name('usaha.ajax_select');
Route::get('suket-usaha/edit/{id}', 'UsahaController@edit');
Route::get('suket-usaha/delete/{id}', 'UsahaController@destroy');
Route::post('suket-usaha/update/{id}', 'UsahaController@update');

//CRUD-Suket-Pengantar SKCK
Route::get('suket-pengantar-skck', 'PengantarSKCKController@index')->name('skck.index');
Route::get('suket-pengantar-skck/create', 'PengantarSKCKController@create')->name('skck.create');
Route::post('suket-pengantar-skck/store', 'PengantarSKCKController@store')->name('skck.store');

Route::get('suket-pengantar-skck/cari', 'PengantarSKCKController@ajax_select')->name('skck.ajax_select');
Route::get('suket-pengantar-skck/edit/{id}', 'PengantarSKCKController@edit');
Route::get('suket-pengantar-skck/delete/{id}', 'PengantarSKCKController@destroy');
Route::post('suket-pengantar-skck/update/{id}', 'PengantarSKCKController@update');

//CRUD-Suket-Kematian
Route::get('suket-kematian', 'KematianController@index')->name('kematian.index');
Route::get('suket-kematian/create', 'KematianController@create')->name('kematian.create');
Route::post('suket-kematian/store', 'KematianController@store')->name('kematian.store');

Route::get('suket-kematian/cari', 'KematianController@ajax_select')->name('kematian.ajax_select');
Route::get('suket-kematian/edit/{id}', 'KematianController@edit');
Route::get('suket-kematian/delete/{id}', 'KematianController@destroy');
Route::post('suket-kematian/update/{id}', 'KematianController@update');


Route::get('/home', 'HomeController@index')->name('home');

