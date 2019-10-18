<?php

use Illuminate\Http\Request;

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

Route::prefix('siswa')->group(function(){
    Route::get('/','SiswaController@index');
    Route::post('/','SiswaController@store');
    Route::get('/{id}','SiswaController@show');
    Route::put('/{id}','SiswaController@update');
    Route::delete('/{id}','SiswaController@destroy');
});
