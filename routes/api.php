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

Route::get('/mhs/get', 'Api\MhsController@getmhs')->name('get-mhs');
Route::get('/mhs/nim/{id}', 'Api\MhsController@getnim')->name('get-nim');
Route::post('/mhs/add', 'Api\MhsController@addmhs')->name('add-mhs');
Route::get('/mhs/del/{id}', 'Api\MhsController@delmhs')->name('del-mhs');