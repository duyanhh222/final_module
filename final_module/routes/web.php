<?php

use Illuminate\Support\Facades\Route;


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
    return view('Client.home');
});
Route::group(['prefix' => 'admin'],function(){
    Route::get('/login','Admin\AdminController@index')->name('admin.login');
    Route::post('/login','Admin\AdminController@check')->name('admin.check.login');
    Route::get('/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');
});

Route::get('/register', function () {
    return view('Client.register');
});