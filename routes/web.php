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

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::any('/search', 'SearchController@index');

Route::prefix('/spots')->group(function(){
    Route::get('/', 'SpotController@index')->name('spots');
    Route::get('/create', 'SpotController@create')->name('spot.create');
    Route::post('/', 'SpotController@store')->name('spot.store');
    Route::get('/{spot}', 'SpotController@show')->name('spot.show');
    Route::get('/{spot}/edit', 'SpotController@edit')->name('spot.edit');
    Route::post('/{spot}/update', 'SpotController@update')->name('spot.update');
    Route::delete('/{spot}', 'SpotController@destroy')->name('spot.destroy');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::prefix('/profile')->group(function(){
    Route::get('/', 'ProfileController@index')->name('profile.show');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/', 'ProfileController@update')->name('profile.update');
});