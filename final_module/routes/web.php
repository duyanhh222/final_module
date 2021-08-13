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

        Route::get('category','Admin\CategoryController@index')->name('category.index');
        Route::get('/{category}/edit','Admin\CategoryController@edit')->name('category.edit');
        Route::get('/{category}','Admin\CategoryController@destroy')->name('category.destroy');

        Route::post('/store','Admin\CategoryController@store')->name('category.store');
        Route::post('/{category}','Admin\CategoryController@update')->name('category.update');

    Route::get('category/create','Admin\CategoryController@create')->name('category.create');

    Route::get('category','Admin\CategoryController@index')->name('category.index');
    Route::get('category/{category}/edit','Admin\CategoryController@edit')->name('category.edit');
    Route::get('category/{category}','Admin\CategoryController@destroy')->name('category.destroy');
    Route::get('category/create','Admin\CategoryController@create')->name('category.create');
    Route::post('category/store','Admin\CategoryController@store')->name('category.store');
    Route::post('category/{category}','Admin\CategoryController@update')->name('category.update');
});



Route::get('/user_login', 'Client\UserController@index')->name('client.login');

Route::get('/user_register', 'Client\UserController@loadRegister')->name('client.loadRegister');
Route::post('/user_register', 'Client\UserController@register')->name('client.register');

Route::get('/register', function () {
    return view('Client.register');
});

Route::get('/a', function () {
    return view('Client.register');
});

