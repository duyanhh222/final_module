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


Route::group(['prefix' => 'admin'],function(){

    Route::get('/login','Admin\AdminController@index')->name('admin.login');
    Route::post('/login','Admin\AdminController@check')->name('admin.check.login');
    Route::get('/logout','Admin\AdminController@logout')->name('admin.logout');

    Route::group(['middleware' => 'check_login'],function(){
        Route::get('/dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');

        Route::get('category','Admin\CategoryController@index')->name('category.index');
        Route::get('/{category}/edit','Admin\CategoryController@edit')->name('category.edit');
        Route::get('/{category}','Admin\CategoryController@destroy')->name('category.destroy');
        Route::post('category/store','Admin\CategoryController@store')->name('category.store');
        Route::post('/{category}','Admin\CategoryController@update')->name('category.update');
        Route::get('category/create','Admin\CategoryController@create')->name('category.create');

        Route::get('food/food','Admin\FoodController@index')->name('food.index');
        Route::get('food/{food}/edit','Admin\FoodController@edit')->name('food.edit');
        Route::get('food/{food}','Admin\FoodController@destroy')->name('food.destroy');
        Route::post('food/store','Admin\FoodController@store')->name('food.store');
        Route::post('food/{food}','Admin\FoodController@update')->name('food.update');
        Route::get('food/food/create','Admin\FoodController@create')->name('food.create');
        Route::get('food/detail/{food}','Admin\FoodController@show')->name('food.show');

        Route::get('/bill/bill','Admin\BillController@index')->name('bill.index');
        Route::get('/{id}/bill/detail','Admin\BillController@detail')->name('bill.detail');
        Route::post('/{id}/bill/detail','Admin\BillController@update')->name('bill.update');


        Route::get('/config/config', 'Admin\ConfigController@index')->name('config.index');
        Route::get('/config/config/edit', 'Admin\ConfigController@edit')->name('config.edit');
        Route::post('/config/config/edit', 'Admin\ConfigController@update')->name('config.update');

        Route::get('/restaurant/restaurant', 'Admin\RestaurantController@index')->name('restaurant.index');
        Route::get('/restaurant/{id}/update', 'Admin\RestaurantController@update')->name('restaurant.update');
        Route::get('/restaurant/register', 'Admin\RestaurantController@register')->name('restaurant.register');

    });

});



Route::get('/user_login', 'Client\UserController@index')->name('client.loadLogin');
Route::post('/user_login', 'Client\UserController@check')->name('client.login');

Route::get('/user_register', 'Client\UserController@loadRegister')->name('client.loadRegister');
Route::post('/user_register', 'Client\UserController@register')->name('client.register');

Route::get('/user/food', 'Client\UserController@showList')->name('client.listFood');
Route::get('/user/create', 'Client\UserController@create')->name('client.createFood');
Route::post('/user/create', 'Client\UserController@store')->name('client.storeFood');
Route::get('user/{food}/edit','Client\UserController@edit')->name('client.editFood');
Route::post('user/{food}','Client\UserController@update')->name('client.updateFood');
Route::get('user/{food}','Client\UserController@destroy')->name('client.destroyFood');
Route::get('/dashboard','Client\UserController@dashboard')->name('client.dashboard');

Route::get('/user/restaurant/bill', 'Client\RestaurantBillController@index')->name('client.restaurant.index');
Route::get('/user/restaurant/{id}/detail', 'Client\RestaurantBillController@detail')->name('client.restaurant.detail');




Route::get('/user/restaurant/bill', 'Client\RestaurantBillController@index')->name('client.restaurant.index');
Route::get('/user/restaurant/{id}/detail', 'Client\RestaurantBillController@detail')->name('client.restaurant.detail');





Route::get('/index', 'Client\HomeClientController@index')->name('client.index');
Route::get('/home', 'Client\HomeClientController@home')->name('client.home');

Route::get('/{id}/category', 'Client\HomeClientController@category')->name('client.category');
Route::get('/product/search', 'Client\HomeClientController@search')->name('client.search');
Route::get('/{id}/tag', 'Client\HomeClientController@tag')->name('client.tag');

Route::get('/show/cart', 'Client\CartController@index')->name('show.cart');
Route::post('/add/cart', 'Client\CartController@store')->name('add.cart');

Route::get('/{id}/food', 'Client\HomeClientController@food')->name('client.food');
Route::get('/{id}/restaurant', 'Client\HomeClientController@restaurant')->name('client.restaurant');

Route::post('/update/cart', 'Client\CartController@update')->name('update.cart');
Route::get('/delete/{cart}/cart', 'Client\CartController@destroy')->name('delete.cart');
Route::get('/dislike/{like}/food', 'Client\FavoriteController@dislike')->name('dislike');
Route::get('/like/{like}/food', 'Client\FavoriteController@like')->name('like');
Route::get('/favorite', 'Client\FavoriteController@index')->name('favorite');



Route::post('/bill-create', 'Client\BillController@create_bill')->name('bill.create');
Route::get('/user_logout', 'Client\UserController@logout')->name('user.logout');

Route::get('/my-bill', 'Client\UserBillController@index')->name('client.bill');
Route::get('/{id}/detail-bill', 'Client\UserBillController@detail')->name('client.bill.detail');
Route::get('/{id}/my-bill', 'Client\UserBillController@destroy')->name('client.bill.destroy');

Route::get('/partner', 'Client\PartnerController@create')->name('client.partner');
Route::post('/partner', 'Client\PartnerController@store')->name('client.partner.add');
Route::get('/partner/success', 'Client\PartnerController@success')->name('client.partner.success');


Route::post('/{id}/profile', 'Client\ProfileController@update')->name('client.profile.update');
Route::get('/{id}/profile', 'Client\ProfileController@destroy')->name('client.profile.destroy');










