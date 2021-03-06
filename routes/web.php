<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/deleted', 'HomeController@viewDeletedUsers')->name('user.deleted');
Route::get('/user/restore/{id}', 'HomeController@restoreUser')->name('user.restore');
Route::get('/user/delete/permanent/{id}', 'HomeController@hardDeleteUser')->name('user.permanent.delete');

Route::get('/team/{team_id}/{show}', 'HomeController@teamDetails')->name('team.details');
Route::post('/add/region', 'HomeController@addData')->name('add.data');

Route::get('/doctor', 'HomeController@viewDoctors')->name('doctor');
Route::post('/import/doctors', 'HomeController@importDoctors');
