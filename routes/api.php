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
Route::get('districts/{region_id}', 'ApiController@getDistricts');
Route::get('territories/{district_id}', 'ApiController@getTerritories');
Route::get('camp/approval/{camp_id}/{user_id}', 'ApiController@approveCamp');
Route::resource('users', 'UserController');
Route::resource('camps', 'CampController');

Route::get('approved/camps/{user_id}', 'ApiController@getApprovedCamps');
Route::get('patients/{camp_id}', 'ApiController@getPatients');
Route::post('patient/add', 'ApiController@createPatient');
