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
Route::get('poll','PollController@index');
Route::get('poll/{id}','PollController@show');
Route::post('poll','PollController@store');
Route::put('poll/{poll}','PollController@update');
Route::delete('poll/{poll}','PollController@destroy');
Route::any('errors','PollController@errors');
Route::apiResource('questions','QuestionController');
Route::get('poll/{poll}/questions','PollController@questions');
