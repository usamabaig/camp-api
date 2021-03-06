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
Route::get('regions/{team_id}', 'ApiController@getRegions');
Route::get('districts/{region_id}', 'ApiController@getDistricts');
Route::get('territories/{district_id}', 'ApiController@getTerritories');
Route::get('camp/approval/{camp_id}/{user_id}', 'ApiController@approveCamp');
Route::resource('users', 'UserController');
Route::resource('camps', 'CampController');

Route::get('filter/districts', 'ApiController@getDistrictsFilter');
Route::get('filter/territories', 'ApiController@getTerritoriesFilter');

Route::get('approved/camps/{user_id}', 'ApiController@getApprovedCamps');
Route::get('patients/{camp_id}', 'ApiController@getPatients');
Route::post('patient/add', 'ApiController@createPatient');
Route::post('patient/drugs/add/{patient_id}', 'ApiController@addDrugsForPatients');
Route::post('start/camp', 'ApiController@startCamp');
Route::get('close/camp/{camp_id}/{used_strips?}', 'ApiController@closeCamp');
Route::get('get/district/{district_id}', 'ApiController@getDistrict');
Route::get('get/territory/{territory_id}', 'ApiController@getTerritory');
Route::get('patient/{patient_id}', 'ApiController@getPatient');

Route::get('get/notifications/unread/{user_id}', 'ApiController@getUnreadNotifications');
Route::get('notification/mark/read/{user_id}', 'ApiController@markNotificationAsRead');

Route::post('get/camps/slips/{user_id}', 'ReportsController@getCampsSlips');
Route::post('get/camps/present/{user_id}', 'ReportsController@getPresentCamps');
Route::post('get/users/report/{user_id}', 'ReportsController@getUsers');

Route::post('get/doctors/report', 'ReportsController@getDoctors');
Route::post('get/patients/report', 'ReportsController@getPatients');

Route::post('password/reset', 'ApiController@resetPassword');

Route::post('password/create', 'PasswordResetController@create');
Route::get('password/find/{token}', 'PasswordResetController@find');
Route::post('password/forget/reset', 'PasswordResetController@reset');
Route::get('get/ccl/medicines', 'ApiController@getCclMedicine');
Route::get('get/other/medicines', 'ApiController@getOtherMedicine');
