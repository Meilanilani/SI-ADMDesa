<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
date_default_timezone_set('Asia/Jakarta');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:api')

Route::prefix('auth')->group(function(){
    Route::post('/signin', 'Api\AuthenticationApi@login');
});

Route::prefix('surat')->middleware('auth:api')->group(function(){
    Route::get('/{id}', 'Api\SuratApi@index');
    Route::post('/request', 'Api\SuratApi@store');
});
