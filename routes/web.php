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

Route::get('/', 'PublicController@index');

Auth::routes();

Route::get('/home', 'PublicController@index');

Route::group(array('middleware'=> 'auth'), function () {
    Route::get('/dashboard', 'InternalController@index')->name('home');
    Route::post('/dashboard', 'InternalController@getBusinessByInput');
    Route::get('chatify/user/{businessId}', 'InternalController@getUserChat');
});