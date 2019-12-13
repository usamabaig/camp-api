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
Route::post('login', 'ApiController@login');
Route::get('roles', 'ApiController@getRoles');
Route::get('teams', 'ApiController@getTeams');
Route::get('regions', 'ApiController@getRegions');
Route::resource('users', 'UserController');
Route::resource('camps', 'CampController');
