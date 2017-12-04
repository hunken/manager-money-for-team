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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'dashboard/', 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::any('/{all}', 'HomeController@index')->where(['all' => '.*']);
});
Route::get('/', function () {
    return redirect('dashboard/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('login#signin');
})->name('logout');
