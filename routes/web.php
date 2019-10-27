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

Route::get('/spots', 'SpotController@index')->name('spots');
Route::get('/spots/create', 'SpotController@create')->name('spot.create');
Route::post('/spots', 'SpotController@store')->name('spot.store');
Route::get('/spots/{spot}', 'SpotController@show')->name('spot.show');
Route::get('/spots/{spot}/edit', 'SpotController@edit')->name('spot.edit');
Route::post('/spots/{spot}/update', 'SpotController@update')->name('spot.update');
Route::delete('/spots/{spot}', 'SpotController@destroy')->name('spot.destroy');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});