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

Route::get('/', 'DashboardController@index');

//RUD-Data-Pengguna
Route::get('data-pengguna', 'PenggunaController@index')->name('pengguna.index');
Route::get('data-pengguna/edit/{id}', 'PenggunaController@edit');
Route::get('data-pengguna/delete/{id}', 'PenggunaController@destroy');
Route::post('data-pengguna/update/{id}', 'PenggunaController@update');

//CRUD-Data-Warga
Route::get('data-warga', 'WargaController@index')->name('warga.index');
Route::get('data-warga/create', 'WargaController@create')->name('warga.create');
Route::post('data-warga/store', 'WargaController@store')->name('warga.store');
Route::get('data-warga/edit/{id}', 'WargaController@edit');
Route::get('data-warga/delete/{id}', 'WargaController@destroy');
Route::post('data-warga/update/{id}', 'WargaController@update');




//CRUD-SKTM-Sekolah
Route::get('suket-tidakmampu-sekolah', 'SKTMSekolahController@index')->name('sktmsekolah.index');
Route::get('suket-tidakmampu-sekolah/create', 'SKTMSekolahController@create')->name('sktmsekolah.create');
Route::post('suket-tidakmampu-sekolah/store', 'SKTMSekolahController@store')->name('sktmsekolah.store');

Route::get('suket-tidakmampu-sekolah/cari', 'SKTMSekolahController@ajax_select')->name('sktmsekolah.ajax_select');

Route::get('suket-tidakmampu-sekolah/edit/{id}', 'SKTMSekolahController@edit');
Route::get('suket-tidakmampu-sekolah/delete/{id}', 'SKTMSekolahController@destroy');
Route::post('suket-tidakmampu-sekolah/update/{id}', 'SKTMSekolahController@update');

Route::get('suket-tidakmampu-sekolah/cetak_pdf/{id}','SKTMSekolahController@cetak_pdf')->name('cetak_pdf');


//CRUD-SKTM-RS
Route::get('suket-tidakmampu-rumahsakit', 'SKTMRSController@index')->name('sktmrs.index');
Route::get('suket-tidakmampu-rumahsakit/create', 'SKTMRSController@create')->name('sktmrs.create');
Route::post('suket-tidakmampu-rumahsakit/store', 'SKTMRSController@store')->name('sktmrs.store');

Route::get('suket-tidakmampu-rumahsakit/cari', 'SKTMRSController@ajax_select')->name('sktmrs.ajax_select');

Route::get('suket-tidakmampu-rumahsakit/edit/{id}', 'SKTMRSController@edit');
Route::get('suket-tidakmampu-rumahsakit/delete/{id}', 'SKTMRSController@destroy');
Route::post('suket-tidakmampu-rumahsakit/update/{id}', 'SKTMRSController@update');

Route::get('suket-tidakmampu-rumahsakit/cetak_pdf/{id}','SKTMRSController@cetak_pdf')->name('cetak_pdf');


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

Route::get('suket-kematian/cetak_pdf/{id}','KematianController@cetak_pdf')->name('cetak_pdf');


//CRUD-Suket-Pengantar Nikah
Route::get('suket-pengantar-nikah', 'PengantarNikahController@index')->name('pnikah.index');
Route::get('suket-pengantar-nikah/create', 'PengantarNikahController@create')->name('pnikah.create');
Route::post('suket-pengantar-nikah/store', 'PengantarNikahController@store')->name('pnikah.store');

Route::get('suket-pengantar-nikah/cari', 'PengantarNikahController@ajax_select')->name('pnikah.ajax_select');
Route::get('suket-pengantar-nikah/edit/{id}', 'PengantarNikahController@edit');
Route::get('suket-pengantar-nikah/delete/{id}', 'PengantarNikahController@destroy');
Route::post('suket-pengantar-nikah/update/{id}', 'PengantarNikahController@update');

Route::get('pdf', 'AdminController@index');

Route::get('/home', 'DashboardController@index')->name('sktm_sekolah.index');

//CRUD-Suket-Domisili
Route::get('suket-domisili', 'DomisiliController@index')->name('domisili.index');
Route::get('suket-domisili/create', 'DomisiliController@create')->name('domisili.create');
Route::post('suket-domisili/store', 'DomisiliController@store')->name('domisili.store');
Route::get('suket-domisili/cari', 'DomisiliController@ajax_select')->name('domisili.ajax_select');
Route::get('suket-domisili/edit/{id}', 'DomisiliController@edit');
Route::get('suket-domisili/delete/{id}', 'DomisiliController@destroy');
Route::post('suket-domisili/update/{id}', 'DomisiliController@update');

//CRUD-Suket-Pindah
Route::get('suket-pindah', 'PindahController@index')->name('pindah.index');
Route::get('suket-pindah/create', 'PindahController@create')->name('pindah.create');
Route::post('suket-pindah/store', 'PindahController@store')->name('pindah.store');

Route::get('suket-pindah/cari', 'PindahController@ajax_select')->name('pindah.ajax_select');
Route::get('suket-pindah/edit/{id}', 'PindahController@edit');
Route::get('suket-pindah/delete/{id}', 'PindahController@destroy');
Route::post('suket-pindah/update/{id}', 'PindahController@update');

//Hak Akses User
Route::get('/user', 'UserController@index')->name('pengajuan.index');
Route::get('user-suket-tidakmampu-sekolah/create', 'UserController@create_sktmsekolah')->name('pengajuan.create_sktmsekolah');
Route::post('user-suket-tidakmampu-sekolah/store', 'UserController@store_sktmsekolah')->name('pengajuan.store_sktmsekolah');
Route::get('user-suket-tidakmampu-sekolah/cari', 'UserController@ajax_select_sktmsekolah')->name('pengajuan.ajax_select_sktmsekolah');
Route::get('user-suket-tidakmampu-rumahsakit/create', 'UserController@create_sktmrs')->name('pengajuan.create_sktmrs');
Route::get('user-suket-kelahiran/create', 'UserController@create_kelahiran')->name('pengajuan.create_kelahiran');
Route::get('user-suket-kematian/create', 'UserController@create_kematian')->name('pengajuan.create_kematian');
Route::get('user-suket-pengantar-nikah/create', 'UserController@create_pengantarnikah')->name('pengajuan.create_pengantarnikah');
Route::get('user-suket-skck/create', 'UserController@create_skck')->name('pengajuan.create_skck');
Route::get('user-suket-ktp-sementara/create', 'UserController@create_ktp')->name('pengajuan.create_ktp');
Route::get('user-suket-usaha/create', 'UserController@create_usaha')->name('pengajuan.create_usaha');
Route::get('user-suket-domisili/create', 'UserController@create_domisili')->name('pengajuan.create_domisili');
